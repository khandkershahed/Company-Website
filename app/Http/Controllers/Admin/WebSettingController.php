<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seo;
use App\Models\Site;
use App\Models\Smtp;
use App\Models\Admin\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Setting\SeoRequest;
use App\Http\Requests\Setting\SiteRequest;
use App\Http\Requests\Setting\SmtpRequest;
use Helper;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'seo'       => Seo::first(),
            'smtp'      => Smtp::first(),
            'site'      => Site::first(),
            'countries' => Country::get(),
        ];
        return view('metronic.pages.setting.index', $data);
        // return view('admin.pages.setting.all', $data);
    }

    function seo(SeoRequest $request)
    {
        $dataToUpdateOrCreate = [
            'page_name'                => $request->page_name,
            'page_link'                => $request->page_link,
            'meta_title'               => $request->meta_title,
            'meta_description'         => $request->meta_description,
            'meta_keywords'            => json_encode($request->meta_keywords),
            'google_analytics_code'    => $request->google_analytics_code,
            'google_verification_code' => $request->google_verification_code,
            'google_adsense_code'      => $request->google_adsense_code,
        ];

        $seo = Seo::updateOrCreate([], $dataToUpdateOrCreate);

        $toastMessage = $seo->wasRecentlyCreated ? 'Data has been created successfully!' : 'Data has been updated successfully!';
        toastr()->success($toastMessage);
        return redirect()->back();
    }

    function smtp(SmtpRequest $request)
    {
        $dataToUpdateOrCreate = [
            'driver'       => $request->driver,
            'host'         => $request->host,
            'port'         => $request->port,
            'username'     => $request->username,
            'password'     => $request->password,
            'encryption'   => $request->encryption,
            'from_address' => $request->from_address,
            'from_name'    => $request->from_name,
            'status'       => $request->status,
        ];

        $smtp = Smtp::updateOrCreate([], $dataToUpdateOrCreate);

        $toastMessage = $smtp->wasRecentlyCreated ? 'Data has been created successfully!' : 'Data has been updated successfully!';
        toastr()->success($toastMessage);
        return redirect()->back();
    }

    function site(SiteRequest $request)
    {
        // dd($request->all());
        $webSetting = Site::firstOrNew([]);

        $logoMainFile    = $request->file('logo');
        $faviconMainFile = $request->file('favicon');
        $uploadPath      = storage_path('app/public/');

        if ($request->hasFile('logo')) {
            if (!empty($webSetting->logo)) {
                $filePaths = [
                    storage_path("app/public/" . $webSetting->logo),
                    storage_path("app/public/requestImg/" . $webSetting->logo)
                ];

                foreach ($filePaths as $filePath) {
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                }
            }
            $globalFunImgLogo = Helper::customUpload($logoMainFile, $uploadPath, 44, 44);
        } else {
            $globalFunImgLogo = ['status' => 0];
        }

        if ($request->hasFile('favicon')) {
            if (!empty($webSetting->favicon)) {
                $filePaths = [
                    storage_path("app/public/" . $webSetting->favicon),
                    storage_path("app/public/requestImg/" . $webSetting->favicon)
                ];

                foreach ($filePaths as $filePath) {
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                }
            }
            $globalFunImgFavicon = Helper::customUpload($faviconMainFile, $uploadPath, 44, 44);
        } else {
            $globalFunImgFavicon = ['status' => 0];
        }

        Site::updateOrCreate([], [
            'site_name'        => $request->site_name,
            'company_name'     => $request->company_name,
            'site_slogan'      => $request->site_slogan,
            'logo'             => $globalFunImgLogo['status']    == 1 ? $logoMainFile->hashName()   : $webSetting->logo,
            'favicon'          => $globalFunImgFavicon['status'] == 1 ? $faviconMainFile->hashName() : $webSetting->favicon,
            'phone_one'        => $request->phone_one,
            'phone_two'        => $request->phone_two,
            'whatsapp_number'  => $request->whatsapp_number,
            'address'          => $request->address,
            'currency'         => $request->currency,
            'country_id'       => $request->country_id,
            'default_language' => $request->default_language,
            'contact_email'    => $request->contact_email,
            'support_email'    => $request->support_email,
            'info_email'       => $request->info_email,
            'sales_email'      => $request->sales_email,
            'facebook_url'     => $request->facebook_url,
            'twitter_url'      => $request->twitter_url,
            'instagram_url'    => $request->instagram_url,
            'linkedin_url'     => $request->linkedin_url,
            'youtube_url'      => $request->youtube_url,
            'github_url'       => $request->github_url,
            'portfolio_url'    => $request->portfolio_url,
            'fiver_url'        => $request->fiver_url,
            'upwork_url'       => $request->upwork_url,
            'service_days'     => $request->service_days,
            'service_time'     => $request->service_time,

        ]);
        toastr()->success('Data has been saved successfully!');

        return redirect()->back();
    }
}
