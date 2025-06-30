<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\RFQController;
// use App\Http\Controllers\Admin\FeedbackController;
// use App\Http\Controllers\Admin\ContactController;
// use App\Http\Controllers\Admin\NewsLetterController;
// use App\Http\Controllers\Frontend\JobController;
// use App\Http\Controllers\Frontend\CartController;
// use App\Http\Controllers\Frontend\HomeController;
// use App\Http\Controllers\Frontend\ShopController;
// use App\Http\Controllers\Frontend\CheckoutController;
// use App\Http\Controllers\Frontend\PageController;
// use App\Http\Controllers\Payment\StripeController;

// //Homepage
// Route::get('/', [HomeController::class, 'index'])->name('homepage');

// //Learn More
// Route::get('/learn/more', [HomeController::class, 'LearnMore'])->name('learn.more');

// //What We Do
// Route::get('/what-we-do', [HomeController::class, 'whatWeDo'])->name('whatwedo');

// //Software All route
// Route::get('/software/common', [HomeController::class, 'softwareCommon'])->name('software.common');

// //Software Info
// Route::get('/software/info', [HomeController::class, 'softwareInfo'])->name('software.info');

// //Hardware All route
// Route::get('/hardware/common', [HomeController::class, 'hardwareCommon'])->name('hardware.common');

// //hardware Info
// Route::get('/hardware/info', [HomeController::class, 'hardwareInfo'])->name('hardware.info');

// Route::get('/quotation/link/{id}', [HomeController::class, 'quotationLink'])->name('quotation.link');


// //Training
// Route::get('/training', [HomeController::class, 'training'])->name('training');

// //Books
// Route::get('/books', [HomeController::class, 'books'])->name('books');

// //Industry
// Route::get('/industry/all', [HomeController::class, 'AllIndustry'])->name('all.industry');
// //Industry details
// Route::get('/industry/{id}/details', [HomeController::class, 'IndustryDetails'])->name('industry.details');

// //Solution
// Route::get('/solution/all', [HomeController::class, 'allSolution'])->name('all.solution');
// //Solution details
// Route::get('/solution/{id}/details/', [HomeController::class, 'SolutionDetails'])->name('solution.details');


// //Contact & Support
// Route::post('/contact_us', [ContactController::class, 'store'])->name('contact.store');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/contact/location', [HomeController::class, 'location'])->name('location');
// Route::get('website/support', [HomeController::class, 'Support'])->name('support');
// Route::get('/newsletter', [NewsletterController::class, 'newsletter']);
// Route::post('/newsletter/store', [NewsLetterController::class, 'store'])->name('newsletter.store');



// //Feature details
// Route::get('/feature/{id}/details/', [HomeController::class, 'FeatureDetails'])->name('feature.details');

// //product
// // Route::get('/product/filter', [HomeController::class, 'filter'])->name('filter');

// // Shop // Filter

// //Shop
// Route::get('/shop', [ShopController::class, 'mainShop'])->name('shop');
// Route::get('/custom/shop', [ShopController::class, 'CustomProduct'])->name('shop.custom');



// //Tech Deals and Refurbished Products
// Route::get('/techdeal', [HomeController::class, 'TechDeal'])->name('tech.deals');
// Route::get('/refurbished', [HomeController::class, 'Refurbished'])->name('refurbished');

// //Brand wise Shop
// Route::get('/brands/all', [HomeController::class, 'AllBrand'])->name('all.brand');
// Route::get('/brandpage/{id}/html', [HomeController::class, 'BrandPage'])->name('brandpage.html');


// //Category wise Shop
// Route::get('/category/all', [HomeController::class, 'AllCategory'])->name('all.category');
// Route::get('/category/{id}/html', [HomeController::class, 'CategoryCommon'])->name('category.details');

// //filter routes
// Route::match(['get','post'],'/custom/product/{slug}', [ShopController::class, 'CustomProductFilter'])->name('custom.product');
// Route::match(['get','post'],'/ngenit/shop/filter', [ShopController::class, 'ShopFilter'])->name('shop.filter');
// // Route::post('getshopProducts', [ShopController::class, 'getShopProducts'])->name('shop.filter');

// //Shop
// Route::get('/shop', [ShopController::class, 'mainShop'])->name('shop');
// Route::get('/custom/shop', [ShopController::class, 'customProduct'])->name('shop.custom');
// // Route::match(['get','post'],'/ngenit/shop/filter_page', [ShopController::class, 'Shop'])->name('shop.filter.partial');

// Route::match(['get','post'],'/ngenit/shop/filter_page', [ShopController::class, 'getShopProducts'])->name('shop.filter.partial');
// Route::post('brand-search', [ShopController::class, 'brandSearch'])->name('brand.search');

// //storys
// Route::get('/storys/all', [HomeController::class, 'AllStory'])->name('all.story');
// Route::get('/story/{id}/details', [HomeController::class, 'StoryDetails'])->name('story.details');

// //Blogs
// Route::get('/blogs/all', [HomeController::class, 'AllBlog'])->name('all.blog');
// Route::get('/blog/{id}/details', [HomeController::class, 'BlogDetails'])->name('blog.details');

// //Techglossy
// Route::get('/techglossy/all', [HomeController::class, 'AllTechGlossy'])->name('all.techglossy');
// Route::get('/techglossy/{id}/details', [HomeController::class, 'TechGlossyDetails'])->name('techglossy.details');


// Route::resource('client-feedback', FeedbackController::class)->except([
//     'index', 'edit', 'update','store'
// ]);
// Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.add');

// Route::get('/shop.html', [HomeController::class, 'shop_html'])->name('shop.html');


// Route::get('/product/{id}/html', [HomeController::class, 'ProductCommon'])->name('product.common');


// /// Product Search Route
// Route::post('/search', [HomeController::class, 'ProductSearch'])->name('product.search');
// // Advance Search Routes
// Route::post('global-search', [HomeController::class, 'globalSearch'])->name('global.search');

// //Industry

// Route::get('/company/overview', [HomeController::class, 'about'])->name('about');



// //Terms & Policy
// Route::get('faq', [HomeController::class, 'faq'])->name('faq');
// Route::get('privacy_policy', [HomeController::class, 'PrivacyPolicy'])->name('privacy.policy');
// Route::get('terms_policy', [HomeController::class, 'TermsPolicy'])->name('terms.policy');
// // Route::get('terms_policy/{id}/details', [HomeController::class, 'TermsPolicyDetails'])->name('terms.details');

// //Portfolio
// Route::get('portfolio', [HomeController::class, 'Portfolio'])->name('portfolio');
// // Route::get('portfolio/{id}/details', [HomeController::class, 'portfolioDetails'])->name('portfolio.details');
// Route::get('portfolio/{id}/details/', [HomeController::class, 'portfolioDetails'])->name('portfolio.details');

// //Work Order Upload
// Route::put('upload/work-order/{id}', [RFQController::class,'workOrderUpload'])->name('work-order.upload');

// //Proof of Payment Upload
// Route::put('upload/payment-proof/{id}', [RFQController::class,'proofPaymentUpload'])->name('payment-proof.upload');






// // Add to cart store data
// Route::post('cart_store', [App\Http\Controllers\Frontend\CartController::class,'AddToCart'])->name('add.cart');

//  // Cart All Route
//  Route::controller(CartController::class)->group(function(){
//     Route::get('/mycart' , 'MyCart')->name('mycart');
//     Route::get('/get-cart-product' , 'GetCartProduct');
//     Route::get('/cart-destroy' , 'CartDestroy')->name('cart.destroy');
//     Route::get('/cart-remove/{rowId}' , 'CartRemove')->name('cart.remove');
//     Route::get('/rfq-remove/{rowId}' , 'rfqRemove')->name('rfq.remove');
//     Route::get('/cart-decrement/{rowId}' , 'CartDecrement')->name('cart.decrement');
//     Route::get('/cart-increment/{rowId}' , 'CartIncrement')->name('cart.increment');
//     Route::get('/add/cart' , 'CartAdd')->name('cart.add');
// });

//  // Checkout Routes

//  Route::get('/checkout', [CheckoutController::class, 'CheckoutCreate'])->name('checkout');
//  Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
//  Route::get('/payment/page/{id}', [CheckoutController::class, 'PaymentPage'])->name('payment.page');
//  Route::get('/checkout/ajax/{region_id}' , [CheckoutController::class,'getGST']);

// // Stripe Payment
//  Route::controller(StripeController::class)->group(function(){
//     Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');
//     Route::post('/cash/order' , 'CashOrder')->name('cash.order');
//  });


//  Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'JobOpenings')->name('job.openings');
//     Route::get('/job/apply', 'jobApply')->name('job.apply');
//     Route::get('/job-details/{id}', 'JobDetails')->name('job.details');
//     Route::get('/job-registration', 'JobRegistration')->name('job.registration');
//     Route::post('/job-registration/store', 'JobRegistrationStore')->name('job_registration.store');
//     // Route::get('/job-register-user', 'jobRegisterUser')->name('job.regiserUser');
// });



// //RFQ
// Route::get('rfq', [HomeController::class, 'rfqCreate'])->name('rfq');
// Route::post('rfq/store', [RFQController::class, 'store'])->name('rfq.add');
// Route::post('rfq/add', [RFQController::class, 'rfqCreate'])->name('rfqCreate');
// Route::get('rfq/{id}/success', [HomeController::class, 'rfqSuccess'])->name('rfq.success');

// // Route::get('/single/product/{id}', [PageController::class, 'productDetails'])->name('product.details');
// Route::get('social-image/{path}', [HomeController::class, 'socialImage'])->where('path', '.*');
// //Kuka Pages
// Route::controller(PageController::class)->group(function () {
//     Route::get('/single/product/{id}', 'productDetails')->name('product.details');
//     Route::get('/brand/{id}/', 'overview')->name('brand.overview');
//     Route::get('/{id}/products', 'brandProducts')->name('brand.products');
//     Route::get('/{id}/pdfs', 'brandPdf')->name('brand.pdf');
//     Route::get('/{id}/contents', 'content')->name('brand.content');
//     // Route::get('/{id}/contents/{id}/details', 'blogDetails')->name('brand.content.details.blog');
//     // Route::get('/{id}/contents/{id}/details', 'storyDetails')->name('brand.content.details.story');
//     Route::get('/{slug}/products', 'ajaxBrandProductsPagination')->name('brand.products.pagination');
// });


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    JobController, CartController, HomeController, ShopController,
    CheckoutController, PageController};
use App\Http\Controllers\Admin\{
    RFQController, ContactController, FeedbackController, NewsletterController};
use App\Http\Controllers\Payment\StripeController;

Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Learn More
Route::get('/learn-more', [HomeController::class, 'LearnMore'])->name('learn.more');

// What We Do
Route::get('/what-we-do', [HomeController::class, 'whatWeDo'])->name('whatwedo');

// Software
Route::prefix('software')->group(function () {
    Route::get('/common', [HomeController::class, 'softwareCommon'])->name('software.common');
    Route::get('/info', [HomeController::class, 'softwareInfo'])->name('software.info');
});

// Hardware
Route::prefix('hardware')->group(function () {
    Route::get('/common', [HomeController::class, 'hardwareCommon'])->name('hardware.common');
    Route::get('/info', [HomeController::class, 'hardwareInfo'])->name('hardware.info');
});

Route::get('/quotation/{slug}', [HomeController::class, 'quotationLink'])->name('quotation.link');

// Training & Books
Route::get('/training', [HomeController::class, 'training'])->name('training');
Route::get('/books', [HomeController::class, 'books'])->name('books');

// Industries
Route::prefix('industries')->group(function () {
    Route::get('/', [HomeController::class, 'AllIndustry'])->name('all.industry');
    Route::get('/{slug}', [HomeController::class, 'IndustryDetails'])->name('industry.details');
});

// Solutions
Route::prefix('solutions')->group(function () {
    Route::get('/', [HomeController::class, 'allSolution'])->name('all.solution');
    Route::get('/{slug}', [HomeController::class, 'SolutionDetails'])->name('solution.details');
});

// Contact & Support
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/location', [HomeController::class, 'location'])->name('location');
Route::get('/support', [HomeController::class, 'Support'])->name('client.support');

// Newsletter
Route::get('/newsletter', [NewsletterController::class, 'newsletter']);
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

// Features
Route::get('/features/{slug}', [HomeController::class, 'featureDetails'])->name('feature.details');

// Shop
Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'mainShop'])->name('shop');
    Route::get('/custom', [ShopController::class, 'customProduct'])->name('shop.custom');
    Route::match(['get', 'post'], '/filter', [ShopController::class, 'shopFilter'])->name('shop.filter');
    Route::match(['get', 'post'], '/filter-page', [ShopController::class, 'getShopProducts'])->name('shop.filter.partial');
    Route::match(['get', 'post'], '/custom/{slug}', [ShopController::class, 'CustomProductFilter'])->name('custom.product');
    Route::post('/brand-search', [ShopController::class, 'brandSearch'])->name('brand.search');
});

// Tech Deals & Refurbished
Route::get('/tech-deals', [HomeController::class, 'TechDeal'])->name('tech.deals');
Route::get('/refurbished', [HomeController::class, 'Refurbished'])->name('refurbished');

// Brands
Route::prefix('brands')->group(function () {
    Route::get('/', [HomeController::class, 'AllBrand'])->name('all.brand');
});
// Route::get('/brandpage/{id}/html', [HomeController::class, 'BrandPage'])->name('brandpage.html');

// Categories
Route::prefix('categories')->group(function () {
    Route::get('/', [HomeController::class, 'AllCategory'])->name('all.category');
    Route::get('/{slug}', [HomeController::class, 'CategoryCommon'])->name('category.details');
});

// Stories
Route::get('/client-stories', [HomeController::class, 'AllStory'])->name('all.story');
Route::get('/client-stories/{slug}', [HomeController::class, 'StoryDetails'])->name('story.details');

// Blogs
Route::get('/blogs', [HomeController::class, 'AllBlog'])->name('all.blog');
Route::get('/blogs/{slug}', [HomeController::class, 'BlogDetails'])->name('blog.details');

// Tech Glossy
Route::get('/tech-glossy', [HomeController::class, 'AllTechGlossy'])->name('all.techglossy');
Route::get('/tech-glossy/{slug}', [HomeController::class, 'TechGlossyDetails'])->name('techglossy.details');

// Feedback
Route::resource('feedback', FeedbackController::class)->only(['create']);
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.add');

Route::get('/shop.html', [HomeController::class, 'shop_html'])->name('shop.html');

// Products
Route::get('/products/{slug}', [HomeController::class, 'ProductCommon'])->name('products.common');

// Search
Route::get('/search', [HomeController::class, 'ProductSearch'])->name('product.search');
Route::post('/global-search', [HomeController::class, 'globalSearch'])->name('global.search');

// Company
Route::get('/company-overview', [HomeController::class, 'about'])->name('about');

// Legal
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [HomeController::class, 'PrivacyPolicy'])->name('privacy.policy');
Route::get('/terms-policy', [HomeController::class, 'TermsPolicy'])->name('terms.policy');

// Portfolio
Route::get('/portfolio', [HomeController::class, 'Portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [HomeController::class, 'portfolioDetails'])->name('portfolio.details');

// RFQ
Route::get('/rfq', [HomeController::class, 'rfqCreate'])->name('rfq');
Route::post('rfq/add', [RFQController::class, 'rfqCreate'])->name('rfqCreate');
Route::get('/rfq/{slug}/success', [HomeController::class, 'rfqSuccess'])->name('rfq.success');
Route::post('rfq/store', [RFQController::class, 'store'])->name('rfq.add');
// Work Order & Payment Upload
Route::put('/upload/work-order/{id}', [RFQController::class, 'workOrderUpload'])->name('work-order.upload');
Route::put('/upload/payment-proof/{id}', [RFQController::class, 'proofPaymentUpload'])->name('payment-proof.upload');

// Cart
// Add to cart store data
Route::post('cart_store', [App\Http\Controllers\Frontend\CartController::class,'AddToCart'])->name('add.cart');

 // Cart All Route
 Route::controller(CartController::class)->group(function(){
    Route::get('/mycart' , 'MyCart')->name('mycart');
    Route::get('/get-cart-product' , 'GetCartProduct');
    Route::get('/cart-destroy' , 'CartDestroy')->name('cart.destroy');
    Route::get('/cart-remove/{rowId}' , 'CartRemove')->name('cart.remove');
    Route::get('/rfq-remove/{rowId}' , 'rfqRemove')->name('rfq.remove');
    Route::get('/cart-decrement/{rowId}' , 'CartDecrement')->name('cart.decrement');
    Route::get('/cart-increment/{rowId}' , 'CartIncrement')->name('cart.increment');
    Route::get('/add/cart' , 'CartAdd')->name('cart.add');
});

//  // Checkout Routes

//  Route::get('/checkout', [CheckoutController::class, 'CheckoutCreate'])->name('checkout');
//  Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
//  Route::get('/payment/page/{id}', [CheckoutController::class, 'PaymentPage'])->name('payment.page');
//  Route::get('/checkout/ajax/{region_id}' , [CheckoutController::class,'getGST']);

// // Stripe Payment
//  Route::controller(StripeController::class)->group(function(){
//     Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');
//     Route::post('/cash/order' , 'CashOrder')->name('cash.order');
//  });

// Jobs
 Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'JobOpenings')->name('job.openings');
    Route::get('/job/apply', 'jobApply')->name('job.apply');
    Route::get('/job-details/{id}', 'JobDetails')->name('job.details');
    Route::get('/job-registration', 'JobRegistration')->name('job.registration');
    Route::post('/job-registration/store', 'JobRegistrationStore')->name('job_registration.store');
    // Route::get('/job-register-user', 'jobRegisterUser')->name('job.regiserUser');
});


// Kuka/Brands Pages
Route::controller(PageController::class)->group(function () {
    Route::get('/products/{slug}', 'productDetails')->name('product.details');
    Route::get('/brand/{slug}', 'overview')->name('brand.overview');
    Route::get('/{slug}/products', 'brandProducts')->name('brand.products');
    Route::get('/{slug}/pdfs', 'brandPdf')->name('brand.pdfs');
    Route::get('/{slug}/contents', 'content')->name('brand.content');
    Route::get('/{slug}/products/paginate', 'ajaxBrandProductsPagination')->name('brand.products.paginate');
});

