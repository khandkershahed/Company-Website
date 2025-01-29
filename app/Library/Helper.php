<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\Frontend\Order;
use Rats\Zkteco\Lib\Helper\Util;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Gloudemans\Shoppingcart\Facades\Cart;
//use NumberFormatter;


/**
 * this imageUpload function is globally upload any images
 *
 */
class Helper
{
    /**
     * generates the image path if the image path does not exist.
     */



    public static function imageDirectory()
    {
        if (!File::isDirectory(storage_path("app/public/requestImg/"))) {
            File::makeDirectory(storage_path("app/public/requestImg/", 0777, true, true));
        }
        if (!File::isDirectory(storage_path("app/public/thumb/"))) {
            File::makeDirectory(storage_path("app/public/thumb/", 0777, true, true));
        }
    }



    /**
     * upload single image
     */
    public static function singleImageUpload($mainFile, $imgPath, $reqWidth = false, $reqHeight = false)
    {
        $fileExtention    = $mainFile->getClientOriginalExtension();
        $fileOriginalName = $mainFile->getClientOriginalName();
        $file_size        = $mainFile->getSize();
        $path             = $imgPath;
        $currentTime      = Str::random(16) . time();
        $fileName         = $currentTime . '.' . $fileExtention;

        $mainFile->storeAs('public/', $fileName);
        $img = Image::make($mainFile)->resize($reqWidth, $reqHeight)->save($path . '/requestImg/' . $fileName);
        $img->resize(146, 204)->save($path . '/thumb/' . $fileName);

        $output['status']             = 1;
        $output['file_name']          = $fileName;
        $output['file_original_name'] = $fileOriginalName;
        $output['file_extention']     = $fileExtention;
        $output['file_size']          = $file_size;

        return $output;
    }


    // file uploads methods

    public static function singleFileUpload($mainFile)
    {
        $fileExtention    = $mainFile->getClientOriginalExtension();
        $fileOriginalName = $mainFile->getClientOriginalName();
        $file_size        = $mainFile->getSize();
        $currentTime      = Str::random(17);
        $fileName         = $currentTime . '.' . $fileExtention;

        $mainFile->storeAs('public/files', $fileName);

        $output['status']             = 1;
        $output['file_name']          = $fileName;
        $output['file_original_name'] = $fileOriginalName;
        $output['file_extention']     = $fileExtention;
        $output['file_size']          = $file_size;

        return $output;
    }




    public static function singleUpload($mainFile, $storagePath = '', $reqWidth = false, $reqHeight = false)
    {
        $fileExtention    = $mainFile->getClientOriginalExtension();
        $fileOriginalName = $mainFile->getClientOriginalName();
        $file_size        = $mainFile->getSize();

        $currentTime      = Str::random(17);
        $fileName         = $currentTime . '.' . $fileExtention;

        if (strpos($mainFile->getMimeType(), 'image') === 0) {
            $path = $storagePath;

            $mainFile->storeAs('public/', $fileName);
            $img = Image::make($mainFile)->resize($reqWidth, $reqHeight)->save($path . '/requestImg/' . $fileName);
            $img->resize(146, 204)->save($path . '/thumb/' . $fileName);
        } else {
            $mainFile->storeAs('public/files', $fileName);
        }

        $output['status']             = 1;
        $output['file_name']          = $fileName;
        $output['file_original_name'] = $fileOriginalName;
        $output['file_extention']     = $fileExtention;
        $output['file_size']          = $file_size;

        return $output;
    }




    // Cart Count
    public static function cartCount($user_id = '')
    {

        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('quantity');
        } else {
            return 0;
        }
    }
    // relationship cart with product
    // public function product(){
    //     return $this->hasOne('App\Models\Admin\Product','id','product_id');
    // }

    public static function getAllProductFromCart($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Cart::with('product')->where('user_id', $user_id)->where('order_id', null)->get();
        } else {
            return 0;
        }
    }
    // Total amount cart
    public static function totalCartPrice($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('amount');
        } else {
            return 0;
        }
    }

    public static function generateCode()
    {
        $prefix = 'NG-';
        $date = date('dmY');
        $lastCode = Order::latest()->value('order_number');
        $lastNumber = intval(substr($lastCode, -3));
        $newNumber = $lastNumber + 1;
        $newNumberPadded = str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        $code = $prefix . $date . $newNumberPadded;
        return $code;
    }


    public static function customUpload(UploadedFile $mainFile, string $uploadPath, ?int $reqWidth = null, ?int $reqHeight = null): array
    {
        // Create an empty output array
        $output = [];

        // Get the hashed file name
        $fileName = $mainFile->hashName();

        // Create the requestImg directory if it does not exist
        if (!is_dir("{$uploadPath}/requestImg")) {
            if (!mkdir("{$uploadPath}/requestImg", 0777, true)) {
                throw new Exception("Failed to create the directory: {$uploadPath}/requestImg");
            }
        }


        // Check if the uploaded file is an image
        if (strpos($mainFile->getMimeType(), 'image') === 0) {
            // Image file upload
            // $mainFile->storeAs('public/', $fileName);
            // $img = Image::make($mainFile)->resize($reqWidth, $reqHeight, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });
            // $img->save("{$uploadPath}/requestImg/{$fileName}");
            $mainFile->storeAs('public/', $fileName);
            $img = Image::make($mainFile);
            if ($reqWidth !== null && $reqHeight !== null) {
                $img->resize($reqWidth, $reqHeight, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save("{$uploadPath}/requestImg/{$fileName}");
            }
        } else {
            // Non-image file upload
            $mainFile->storeAs('public/files/', $fileName);
        }

        // Populate the output array with file information
        $output = [
            'status'         => 1,
            'file_name'      => $fileName,
            'file_extension' => $mainFile->getClientOriginalExtension(),
            'file_size'      => $mainFile->getSize()
        ];

        // Return the output array
        return array_map('htmlspecialchars', $output);
    }


    public static function Upload(UploadedFile $mainFile, string $uploadPath, ?int $reqWidth = null, ?int $reqHeight = null): array
    {
        // Create an empty output array
        $output = [];

        // Get the hashed file name
        $fileName = $mainFile->hashName();

        // Check if the uploaded file is an image
        if (strpos($mainFile->getMimeType(), 'image') === 0) {
            // Create the requestImg directory if it does not exist
            if (!is_dir("{$uploadPath}/requestImg")) {
                if (!mkdir("{$uploadPath}/requestImg", 0777, true)) {
                    abort(404, "Failed to create the directory: {$uploadPath}/requestImg");
                }
            }

            // Image file upload
            $mainFile->storeAs('public/', $fileName);
            $img = Image::make($mainFile);
            if ($reqWidth !== null && $reqHeight !== null) {
                $img->resize($reqWidth, $reqHeight, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save("{$uploadPath}/requestImg/{$fileName}");
            }
        } else {
            // Non-image file upload
            $mainFile->storeAs('public/files/', $fileName);
        }

        // Populate the output array with file information
        $output = [
            'status'         => 1,
            'file_name'      => $fileName,
            'file_extension' => $mainFile->getClientOriginalExtension(),
            'file_size'      => $mainFile->getSize(),
            'file_type'      => $mainFile->getMimeType(),
        ];

        // Return the output array
        return array_map('htmlspecialchars', $output);
    }


    public static function multiAttachment(UploadedFile $file, $uploadPath)
    {
        $output = [];


        if ($file->isValid()) {
            $fileName = $file->hashName();
            $file->storeAs("public/files/{$uploadPath}", $fileName);

            $output = [
                'status'         => 1,
                'file_name'      => $fileName,
                'file_extension' => $file->getClientOriginalExtension(),
                'file_size'      => $file->getSize(),
            ];
        }


        return $output;
    }

    public static function caseAttachment($file, $filePath)
    {
        // Check if file is valid
        if ($file->isValid()) {
            // Generate a unique file name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->storeAs($filePath, $fileName);

            // Return the status and file name in an array
            return [
                'status' => 1,
                'file_name' => $fileName
            ];
        } else {
            // Return error status if file is not valid
            return [
                'status' => 0,
                'file_name' => null
            ];
        }
    }



    public static function getTodayCheckInCheckOut(ZKTeco $self, $employeeId)
    {
        $self->_section = __METHOD__;

        // Get session
        $command = Util::CMD_ATT_LOG_RRQ;
        $command_string = '';
        $session = $self->_command($command, $command_string, Util::COMMAND_TYPE_DATA);

        // Return empty if session fails
        if ($session === false) {
            return [];
        }

        $attData = Util::recData($self);

        // If no data, return empty
        if (empty($attData)) {
            return [];
        }

        $attData = substr($attData, 10); // Remove the first 10 chars once

        // Initialize attendance array
        $attendance = [];

        // Iterate through the data
        while (strlen($attData) > 40) {
            $u = unpack('H78', substr($attData, 0, 39));

            // Hex to decimal conversion and extracting data
            $u1 = hexdec(substr($u[1], 4, 2));
            $u2 = hexdec(substr($u[1], 6, 2));
            $uid = $u1 + ($u2 * 256);
            $id = str_replace(chr(0), '', hex2bin(substr($u[1], 8, 18)));
            $state = hexdec(substr($u[1], 56, 2));
            $timestamp = Util::decodeTime(hexdec(Util::reverseHex(substr($u[1], 58, 8))));
            $type = hexdec(Util::reverseHex(substr($u[1], 66, 2)));

            $carbonTimestamp = Carbon::parse($timestamp);

            // Only store attendance data if the record is for today and for the specific employee
            if ($carbonTimestamp->isToday() && $id == $employeeId) {
                $attendance[] = [
                    'uid' => $uid,
                    'id' => $id,
                    'state' => $state,
                    'timestamp' => $timestamp,
                    'type' => $type,
                    'date' => $carbonTimestamp->toDateString(), // Store only the date part
                ];
            }

            // Move to the next set of data
            $attData = substr($attData, 40);
        }

        // If no matching attendance records, return empty
        if (empty($attendance)) {
            return [];
        }

        // Sort the attendance by timestamp (optimized sorting)
        usort($attendance, function ($a, $b) {
            return strtotime($a['timestamp']) - strtotime($b['timestamp']);
        });

        // Return the first (check-in) and last (check-out) attendance records
        return [
            'check_in' => $attendance[0],
            'check_out' => end($attendance)
        ];
    }
}
