<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Exception;
use Illuminate\Http\Request;
use App\Models\StaffDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StaffDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Step 1: Validate the input
            $validator = Validator::make(
                $request->all(),
                [
                    'document_name' => 'required|string|max:250',
                    'document_file' => 'required|file|max:5120', // Max 5MB
                ],
                [
                    'document_name.required' => 'The Document Name is required.',
                    'document_file.required' => 'The Document file is required.',
                    'document_file.max' => 'The Document file may not be greater than 5MB.',
                ]
            );

            if ($validator->fails()) {
                foreach ($validator->messages()->all() as $message) {
                    Session::flash('error', $message);
                }
                return redirect()->back()->withInput();
            }

           $files = [
                'document_file'  => $request->file('document_file'),
            ];
            $uploadedFiles = [];
            foreach ($files as $key => $file) {
                if (!empty($file)) {
                    $filePath = 'staff_documents/' . $key;
                    $uploadedFiles[$key] = Helper::imageUpload($file, $filePath);
                    if ($uploadedFiles[$key]['status'] === 0) {
                        return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                    }
                } else {
                    $uploadedFiles[$key] = ['status' => 0];
                }
            }

            // Step 3: Save to the database
            $document                = new StaffDocument();
            $document->user_id       = $request->input('user_id') ?? Auth::user()->id;
            $document->document_name = $request->input('document_name');
            $document->valid_from    = $request->input('valid_from');
            $document->valid_to      = $request->input('valid_to');
            $document->document_file = $uploadedFiles['document_file']['status'] == 1 ? $uploadedFiles['document_file']['file_path'] : null;
            $document->save();

            // Step 4: Redirect with success

            Session::flash('success', 'Document uploaded successfully.');
            return redirect()->back(); // Change to your route

        } catch (Exception $e) {
            // Step 5: Handle errors
            Session::flash('error', 'Something went wrong while uploading the document:' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Step 1: Validate input
            $validator = Validator::make(
                $request->all(),
                [
                    'document_name' => 'required|string|max:250',
                    'document_file' => 'nullable|file|max:5120', // Optional file
                ],
                [
                    'document_name.required' => 'The Document Name is required.',
                    'document_file.max' => 'The Document file may not be greater than 5MB.',
                ]
            );

            if ($validator->fails()) {
                foreach ($validator->messages()->all() as $message) {
                    Session::flash('error', $message);
                }
                return redirect()->back()->withInput();
            }

            // Step 2: Find the document
            $document = StaffDocument::findOrFail($id);

            // Step 3: If file uploaded, process and replace
            $files = [
                'document_file'  => $request->file('document_file'),
            ];
            $uploadedFiles = [];

            foreach ($files as $key => $file) {
                if (!empty($file)) {
                    $filePath = 'staff_documents/' . $key;
                    $oldFile = $document->$key ?? null;

                    if ($oldFile) {
                        Storage::delete("public/" . $oldFile);
                    }
                    $uploadedFiles[$key] = Helper::imageUpload($file, $filePath);
                    if ($uploadedFiles[$key]['status'] === 0) {
                        return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                    }
                } else {
                    $uploadedFiles[$key] = ['status' => 0];
                }
            }

            // Step 4: Update other fields
            $document->document_file = $uploadedFiles['document_file']['status'] == 1 ? $uploadedFiles['document_file']['file_path'] : $document->document_file;
            $document->user_id       = $request->input('user_id') ?? Auth::user()->id;
            $document->document_name = $request->input('document_name');
            $document->valid_from    = $request->input('valid_from');
            $document->valid_to      = $request->input('valid_to');
            $document->save();

            Session::flash('success', 'Document updated successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('error', 'Error updating document: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $document = StaffDocument::findOrFail($id);
        if ($document->document_file && file_exists(public_path($document->document_file))) {
            unlink(public_path($document->document_file));
        }
        $document->delete();
    }
}
