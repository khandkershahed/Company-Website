<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Row;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class RowController extends Controller
{

    public function index()
    {
        $data['rows'] = Row::orderBy('id' , 'desc')->select('rows.title','rows.image','rows.id')->get();
        return view('admin.pages.row.all', $data);
    }

    public function create()
    {
        return view('admin.pages.row.add');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($validator->fails()) {
            Toastr::error($validator->errors()->first(), 'Failed', ['timeOut' => 30000]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mainFile = $request->file('image');
        $imgPath = storage_path('app/public/');
        $imageFileName = '';

        if (!empty($mainFile)) {
            $globalFunImg = Helper::customUpload($mainFile, $imgPath);
            if ($globalFunImg['status'] == 1) {
                $imageFileName = $globalFunImg['file_name'];
            } else {
                Toastr::warning('Image upload failed! Please try again.');
                return redirect()->back();
            }
        }

        Row::create([
            'title'       => $request->title,
            'badge'       => $request->badge,
            'short_des'   => $request->short_des,
            'btn_name'    => $request->btn_name,
            'link'        => $request->link,
            'list_title'  => $request->list_title,
            'list_one'    => $request->list_one,
            'list_two'    => $request->list_two,
            'list_three'  => $request->list_three,
            'list_four'   => $request->list_four,
            'description' => $request->description,
            'image'       => $imageFileName,
        ]);

        Toastr::success('Data Inserted Successfully');
        return redirect()->back();
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data['row'] = Row::find($id);
        return view('admin.pages.row.edit', $data);
    }


    public function update(Request $request, $id)
    {

        $row = Row::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($row) {
            $uploadPath = storage_path('app/public/');
            $mainFile = $request->image;

            if ($mainFile) {
                $globalFunImg = Helper::customUpload($mainFile, $uploadPath);
                if ($globalFunImg['status'] == 1) {
                    File::delete(public_path($uploadPath . '/') . $row->image);
                    File::delete(public_path($uploadPath . '/thumb/') . $row->image);
                    File::delete(public_path($uploadPath . '/') . $row->image);
                }
            } else {
                $globalFunImg['status'] = 0;
            }

            $row->update([
                'title'       => $request->title,
                'badge'       => $request->badge,
                'short_des'   => $request->short_des,
                'btn_name'    => $request->btn_name,
                'link'        => $request->link,
                'list_title'  => $request->list_title,
                'list_one'    => $request->list_one,
                'list_two'    => $request->list_two,
                'list_three'  => $request->list_three,
                'list_four'   => $request->list_four,
                'description' => $request->description,
                'image'       => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $row->image,
            ]);

            Toastr::success('Data has been updated');
        } else {
            Toastr::error('Row not found', 'Failed', ['timeOut' => 30000]);
        }

        return redirect()->back();
    }



    public function destroy($id)
    {
        $row = Row::find($id);

        if (File::exists(public_path('storage/') . $row->image)) {
            File::delete(public_path('storage/') . $row->image);
        }
        if (File::exists(public_path('storage/') . $row->image)) {
            File::delete(public_path('storage/') . $row->image);
        }
        if (File::exists(public_path('storage/thumb/') . $row->image)) {
            File::delete(public_path('storage/thumb/') . $row->image);
        }
        $row->delete();
    }
}
