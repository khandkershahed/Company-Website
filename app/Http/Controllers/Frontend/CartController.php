<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{

    public function MyCart()
    {

        $data['cart_details'] = Cart::content();
        $cartItems = Cart::content();
        //dd($cartItems);
        $cartProductIds = $cartItems->pluck('id')->toArray();
        $cartProductCategories = Product::whereIn('id', $cartProductIds)
            ->pluck('sub_cat_id')
            ->unique()
            ->toArray();

        // Get related products based on the categories in the cart
        $data['products'] = Product::whereIn('sub_cat_id', $cartProductCategories)
            ->where('id', '!=', $cartProductIds) // exclude the current product
            ->select('products.id', 'products.rfq', 'products.slug', 'products.name', 'products.thumbnail', 'products.price', 'products.discount')
            ->limit(16)
            ->get();

        return view('frontend.pages.cart.cart', $data);
    } // End Method


    public function AddToCart(Request $request)
    {
        $id = $request->product_id;
        $name = $request->name;
        $quantity = $request->qty;

        // Get the current cart items
        $cartItems = Cart::content();

        // Check if the product is already in the cart
        $productInCart = $cartItems->firstWhere('id', $id);

        if ($productInCart) {
            // If the product already exists in the cart, return a response indicating this
            return response()->json([
                'exists' => true,
                'cartHeader' => Cart::count(),  // Cart count can be returned if needed
                'success' => false
            ]);
        }

        // If the product doesn't exist, add it to the cart
        Cart::add([
            'id'      => $id,
            'name'    => $name,
            'qty'     => $quantity,
            'price'   => 0,  // Set the actual price here
            'weight'  => 1,  // Set weight if needed
        ]);

        // Get updated cart count and items
        $cart = Cart::count();
        $cart_items = Cart::content();

        // Prepare the HTML for the cart side panel (offcanvas)
        $responseHtml = view('frontend.partials.offcanvas', compact('cart_items'))->render();

        // Return the response with success and updated cart HTML
        return response()->json([
            'exists' => false,  // Product was not in the cart
            'cartHeader' => $cart,
            'html' => $responseHtml,
            'success' => true
        ]);
    }






    public function updateCart(Request $request)
    {
        //dd($request->rowID);

        Cart::update($request->rowID, ['qty' => $request->qty]);

        Toastr::success('Successfully Updated Your Cart');
        return response()->json();
    }





    public function GetCartProduct()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal

        ));
    } // End Method


    public function rfqRemove($rowId)
    {
        Cart::remove($rowId);
        $data['cart_sub_total'] = Cart::subtotal();
        $data['cart_total'] = Cart::total();

        $cart = Cart::count();
        $cart_items = Cart::content();

        $responseHtml = view('frontend.partials.offcanvas', compact('cart_items'))->render();

        return response()->json([
            'cartHeader' => $cart,
            'html' => $responseHtml,
            'success' => true
        ]);
    } // End Method


    // public function CartRemove($rowId)
    // {
    //     Cart::remove($rowId);
    //     $data['cart_details'] = Cart::content();
    //     $data['cart_sub_total'] = Cart::subtotal();
    //     $data['cart_total'] = Cart::total();

    //     Toastr::success('Successfully Updated Your Cart');
    //     return response()->json(view('frontend.pages.cart.partials.cart_product', $data)->render());
    // } // End Method


    public function CartDecrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        $data['cart_details'] = Cart::content();
        $data['cart_sub_total'] = Cart::subtotal();
        $data['cart_total'] = Cart::total();

        Toastr::success('Successfully Updated Your Cart');
        return response()->json(view('frontend.pages.cart.partials.cart_product', $data)->render());
    } // End Method


    public function CartIncrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        $data['cart_details'] = Cart::content();
        $data['cart_sub_total'] = Cart::subtotal();
        $data['cart_total'] = Cart::total();

        Toastr::success('Successfully Updated Your Cart');
        return response()->json(view('frontend.pages.cart.partials.cart_product', $data)->render());
        // return response()->json('Increment');
    } // End Method

    public function CartDestroy()
    {
        Cart::destroy();
        $data['cart_details'] = Cart::content();
        $data['cart_sub_total'] = Cart::subtotal();
        $data['cart_total'] = Cart::total();

        Toastr::warning('Successfully Empty Your Cart');
        return response()->json(view('frontend.pages.cart.partials.cart_product', $data)->render());
    } // End Method









    public function CheckoutCreate()
    {

        if (Auth::guard('client')->check()) {

            if (Cart::total() > 0) {

                $data['carts'] = Cart::content();
                $data['cartQty'] = Cart::count();
                $data['cartTotal'] = Cart::total();


                return view('frontend.checkout.checkout_view', $data);
            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }
        } elseif (Auth::guard('partner')->check()) {
            # code...
        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    } // End Method
}
