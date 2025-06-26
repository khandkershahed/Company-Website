<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Models\Admin\FrontendNavbarMenu;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\FrontendNavbarModule;
use App\Models\Admin\FrontendNavbarMenuItem;

class FrontendNavbarMenuItemController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['frontendNavbarModules']   = FrontendNavbarModule::select('frontend_navbar_modules.id', 'frontend_navbar_modules.name')->get();
        $data['frontendNavbarMenus']     = FrontendNavbarMenu::select('frontend_navbar_modules.id', 'frontend_navbar_modules.name')->get();
        $data['frontendNavbarMenuItems'] = FrontendNavbarMenuItem::latest()->get();
        return view('admin.pages.frontendNavbarMenuItem.all', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'frontend_navbar_module_id' => 'nullable',
                'frontend_navbar_menu_id'   => 'nullable',
                'name'                      => 'nullable',
                'link'                      => 'nullable',
                'image'                     => 'sometimes',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $image = $request->image;
            $uploadPath = storage_path('app/public/');
            if (isset($image)) {
                $globalFunimage = Helper::singleUpload($image, $uploadPath);
            } else {
                $globalFunimage = ['status' => 0];
            }
            FrontendNavbarMenuItem::create([
                'frontend_navbar_module_id' => $request->frontend_navbar_module_id,
                'frontend_navbar_menu_id'   => $request->frontend_navbar_menu_id,
                'name'                      => $request->name,
                'link'                      => $request->link,
                'image'                     => $globalFunimage['status'] == 1 ? $globalFunimage['file_name'] : '',
            ]);
            Toastr::success('Data has been created');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $frontendNavbarMenuItem = FrontendNavbarMenuItem::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'frontend_navbar_module_id' => 'nullable',
                'frontend_navbar_menu_id'   => 'nullable',
                'name'                      => 'nullable',
                'link'                      => 'nullable',
                'image'                     => 'sometimes',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg'
            ],
        );

        if ($validator->passes()) {
            $mainFile = $request->image;
            $uploadPath = storage_path('app/public/');

            if (isset($mainFile)) {
                $globalFunImg = Helper::singleUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($frontendNavbarMenuItem)) {
                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/') . $frontendNavbarMenuItem->image)) {
                        File::delete(public_path('storage/') . $frontendNavbarMenuItem->image);
                    }
                    if (File::exists(public_path('storage/') . $frontendNavbarMenuItem->image)) {
                        File::delete(public_path('storage/') . $frontendNavbarMenuItem->image);
                    }
                    if (File::exists(public_path('storage/thumb/') . $frontendNavbarMenuItem->image)) {
                        File::delete(public_path('storage/thumb/') . $frontendNavbarMenuItem->image);
                    }
                }

                $frontendNavbarMenuItem->update([
                    'frontend_navbar_module_id' => $request->frontend_navbar_module_id,
                    'frontend_navbar_menu_id'   => $request->frontend_navbar_menu_id,
                    'name'                      => $request->name,
                    'link'                      => $request->link,
                    'image'    => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $frontendNavbarMenuItem->image,
                ]);
            }
            Toastr::success('Data has been updated');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frontendNavbarMenuItem = FrontendNavbarMenuItem::find($id);

        if (File::exists(public_path('storage/') . $frontendNavbarMenuItem->image)) {
            File::delete(public_path('storage/') . $frontendNavbarMenuItem->image);
        }
        if (File::exists(public_path('storage/') . $frontendNavbarMenuItem->image)) {
            File::delete(public_path('storage/') . $frontendNavbarMenuItem->image);
        }
        if (File::exists(public_path('storage/thumb/') . $frontendNavbarMenuItem->image)) {
            File::delete(public_path('storage/thumb/') . $frontendNavbarMenuItem->image);
        }
        $frontendNavbarMenuItem->delete();
    }
}
