<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Industry;
use App\Models\Admin\DocumentPdf;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DocumentPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pdfs'] = DocumentPdf::latest()->get();

        return view('admin.pages.document.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands'] = Brand::latest()->get(['id', 'title']);
        $data['products'] = Product::latest()->get(['id', 'name']);
        $data['industries'] = Industry::latest()->get(['id', 'title']);
        $data['solutions'] = SolutionDetail::latest()->get(['id', 'name']);
        return view('admin.pages.document.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'         => 'required',
                'industry_id.*' => 'nullable|exists:industries,id',
                'brand_id.*'    => 'nullable|exists:brands,id',
                'document'      => 'required|mimes:pdf,doc,docs|max:35000',
            ],
            [
                'mimes'    => 'The :attribute must be a file of type: pdf - doc - docs',
                'required' => 'The :attribute must be required',
                'max'      =>  'The Document file must be less than 2Mb.'
            ],
        );

        if ($validator->fails()) {
            Toastr::error($validator->errors(), 'Failed', ['timeOut' => 30000]);
            return redirect()->back();
        }

        $mainFileCatalog = $request->file('document');
        $mainFilesPageImage = $request->file('page_image');
        $filePath = storage_path('app/public/');

        if (!empty($mainFileCatalog)) {
            $globalFunCatalog = Helper::Upload($mainFileCatalog, $filePath);
        } else {
            $globalFunCatalog = ['status' => 0];
        }

        $globalFunPageImages = [];
        if ($request->hasFile('page_image')) {
            foreach ($mainFilesPageImage as $mainFilePageImage) {
                $globalFunPageImage = Helper::Upload($mainFilePageImage, $filePath);
                $globalFunPageImages[] = $globalFunPageImage['status'] == 1 ? $mainFilePageImage->hashName() : null;
            }
        }

        $slug = Str::slug($request->title);
        $count = DocumentPdf::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;

        DocumentPdf::create([

            'category'         => $request->category,
            'brand_id'         => $request->brand_id,
            'product_id'       => $request->product_id,
            'industry_id'      => $request->industry_id,
            'solution_id'      => $request->solution_id,
            'title'            => $request->title,
            'page_link'        => $request->page_link,
            'slug'             => $data['slug'],
            'description'      => $request->description,
            'button_name'      => $request->button_name,
            'button_link'      => $request->button_link,
            'page_image'       => json_encode($globalFunPageImages),
            'page_description' => json_encode($request->page_description),
            'document'         => $globalFunCatalog['status'] == 1 ? $mainFileCatalog->hashName() : null,
        ]);

        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pdf'] = DocumentPdf::find($id);
        $data['brands'] = Brand::latest()->get(['id', 'title']);
        $data['products'] = Product::latest()->get(['id', 'name']);
        $data['industries'] = Industry::latest()->get(['id', 'title']);
        $data['solutions'] = SolutionDetail::latest()->get(['id', 'name']);
        return view('admin.pages.document.edit', $data);
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
        // dd($request->all());
        $documentPdf = DocumentPdf::findOrFail($id);
        $filePath = storage_path('app/public/');
        $updates = [
            'category'         => $request->category,
            'brand_id'         => $request->brand_id,
            'product_id'       => $request->product_id,
            'industry_id'      => $request->industry_id,
            'solution_id'      => $request->solution_id,
            'title'            => $request->title,
            'page_link'        => $request->page_link,
            'description'      => $request->description,
            'button_name'      => $request->button_name,
            'button_link'      => $request->button_link,
        ];

        $globalFunPageImages = [];

        foreach (['document', 'page_image'] as $type) {
            $file = $request->file($type);

            if (!empty($file)) {
                // Handle the uploaded file
                $hashName = Helper::Upload($file, $filePath)['file_name'];

                // Delete existing files
                $paths = [
                    storage_path("app/public/{$documentPdf->$type}"),
                    storage_path("app/public/{$documentPdf->$type}")
                ];

                foreach ($paths as $path) {
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }

                $updates[$type] = $hashName;
            } elseif ($type === 'page_image') {
                $uploadedImages = $request->input('page_image', []);

                foreach ($uploadedImages as $uploadedImage) {
                    $globalFunPageImage = Helper::Upload($uploadedImage, $filePath);
                    $globalFunPageImages[] = $globalFunPageImage['status'] == 1 ? $uploadedImage->hashName() : null;
                }

                $updates[$type] = json_encode($globalFunPageImages);
            } else {
                // If no file is uploaded, keep the existing value
                $updates[$type] = $documentPdf->$type;
            }
        }

        // Update the model with the new data
        $documentPdf->update($updates);

        Toastr::success('Data has been Updated successfully!');
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
        $pdf = DocumentPdf::findOrFail($id);

        $basePaths = [
            storage_path('app/public/'),
            storage_path('app/public/')
        ];

        foreach (['document', 'page_image'] as $field) {
            foreach ($basePaths as $basePath) {
                $filePath = $basePath . $pdf->$field;
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        }
        $pdf->delete();
    }
}
