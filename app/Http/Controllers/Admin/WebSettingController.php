<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\Seo;
use App\Models\Site;
use App\Models\Smtp;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Setting\SeoRequest;
use App\Http\Requests\Setting\SiteRequest;
use App\Http\Requests\Setting\SmtpRequest;

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

    // function smtp(SmtpRequest $request)
    // {
    //     $dataToUpdateOrCreate = [
    //         'driver'       => $request->driver,
    //         'host'         => $request->host,
    //         'port'         => $request->port,
    //         'username'     => $request->username,
    //         'password'     => $request->password,
    //         'encryption'   => $request->encryption,
    //         'from_address' => $request->from_address,
    //         'from_name'    => $request->from_name,
    //         'status'       => $request->status,
    //     ];

    //     $smtp = Smtp::updateOrCreate([], $dataToUpdateOrCreate);

    //     $toastMessage = $smtp->wasRecentlyCreated ? 'Data has been created successfully!' : 'Data has been updated successfully!';
    //     toastr()->success($toastMessage);
    //     return redirect()->back();
    // }



    public function smtp(Request $request)
    {
        // Update runtime config for mail settings
        Config::set('app.debug', $request->has('APP_DEBUG')); // true or false



        // Update the .env file for persistence
        $envKeys = [
            'APP_DEBUG',
            'MAIL_MAILER',
            'MAIL_HOST',
            'MAIL_PORT',
            'MAIL_USERNAME',
            'MAIL_PASSWORD',
            'MAIL_ENCRYPTION',
            'MAIL_FROM_ADDRESS',
            'MAIL_FROM_NAME',
        ];

        //update mail configuration values using config facade
        Config::set('app.debug', $request->has('APP_DEBUG'));
        Config::set('mail.mailer', $request->MAIL_MAILER);
        Config::set('mail.host', $request->MAIL_HOST);
        Config::set('mail.port', $request->MAIL_PORT);
        Config::set('mail.username', $request->MAIL_USERNAME);
        Config::set('mail.password', $request->MAIL_PASSWORD);
        Config::set('mail.encryption', $request->MAIL_ENCRYPTION);
        Config::set('mail.from.address', $request->MAIL_FROM_ADDRESS);
        Config::set('mail.from.name', $request->MAIL_FROM_NAME);

        //update mail configuration values in .env file
        $env = file_get_contents(base_path('.env'));
        $env = preg_replace('/MAIL_MAILER=(.*)/', 'MAIL_MAILER=' . $request->MAIL_MAILER, $env);
        $env = preg_replace('/MAIL_MAILER=(.*)/', 'MAIL_MAILER=' . $request->MAIL_MAILER, $env);
        $env = preg_replace('/MAIL_HOST=(.*)/', 'MAIL_HOST=' . $request->MAIL_HOST, $env);
        $env = preg_replace('/MAIL_PORT=(.*)/', 'MAIL_PORT=' . $request->MAIL_PORT, $env);
        $env = preg_replace('/MAIL_USERNAME=(.*)/', 'MAIL_USERNAME=' . $request->MAIL_USERNAME, $env);
        $env = preg_replace('/MAIL_PASSWORD=(.*)/', 'MAIL_PASSWORD=' . $request->MAIL_PASSWORD, $env);
        $env = preg_replace('/MAIL_ENCRYPTION=(.*)/', 'MAIL_ENCRYPTION=' . $request->MAIL_ENCRYPTION, $env);
        $env = preg_replace('/MAIL_FROM_ADDRESS=(.*)/', 'MAIL_FROM_ADDRESS=' . $request->MAIL_FROM_ADDRESS, $env);
        file_put_contents(base_path('.env'), $env);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Update or add key=value in .env file safely.
     */
    protected function setEnvValue($key, $value)
    {
        $envPath = base_path('.env');
        if (!file_exists($envPath)) {
            throw new \Exception(".env file not found");
        }

        $escapedValue = str_replace('"', '\"', $value);
        $formattedValue = "\"{$escapedValue}\"";

        $envContent = file_get_contents($envPath);

        if (preg_match("/^{$key}=.*/m", $envContent)) {
            $envContent = preg_replace(
                "/^{$key}=.*/m",
                "{$key}={$formattedValue}",
                $envContent
            );
        } else {
            $envContent .= "\n{$key}={$formattedValue}";
        }

        file_put_contents($envPath, $envContent);
    }


    public function runTools(Request $request)
    {
        $action = $request->input('action');

        $validActions = [
            'link' => 'storage:link',
            'cache:clear' => 'cache:clear',
            'optimize:clear' => 'optimize:clear',
            'route:cache' => 'route:cache',
            'route:clear' => 'route:clear',
            'view:clear' => 'view:clear',
            'config:cache' => 'config:cache',
            'migrate' => 'migrate',
        ];

        if (!array_key_exists($action, $validActions)) {
            return back()->with('error', 'Invalid action selected');
        }

        try {
            Artisan::call($validActions[$action]);
            return back()->with('success', ucfirst(str_replace(':', ' ', $action)) . ' executed successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Replace or add a value in the .env file.
     */



    function site(SiteRequest $request)
    {
        // dd($request->all());
        $webSetting = Site::firstOrNew([]);

        $logoMainFile    = $request->file('logo');
        $faviconMainFile = $request->file('favicon');
        $ogImageMainFile = $request->file('og_image');
        $uploadPath      = storage_path('app/public/');

        if ($request->hasFile('logo')) {
            if (!empty($webSetting->logo)) {
                $filePaths = [
                    storage_path("app/public/" . $webSetting->logo),
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
                    storage_path("app/public/" . $webSetting->favicon)
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
        if ($request->hasFile('og_image')) {
            if (!empty($webSetting->og_image)) {
                $filePaths = [
                    storage_path("app/public/" . $webSetting->og_image),
                ];

                foreach ($filePaths as $filePath) {
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                }
            }
            $globalFunImgOGImage = Helper::customUpload($ogImageMainFile, $uploadPath, 44, 44);
        } else {
            $globalFunImgOGImage = ['status' => 0];
        }

        Site::updateOrCreate([], [
            'site_name'        => $request->site_name,
            'company_name'     => $request->company_name,
            'site_slogan'      => $request->site_slogan,
            'logo'             => $globalFunImgLogo['status']    == 1 ? $logoMainFile->hashName()   : $webSetting->logo,
            'favicon'          => $globalFunImgFavicon['status'] == 1 ? $faviconMainFile->hashName() : $webSetting->favicon,
            'og_image'         => $globalFunImgOGImage['status'] == 1 ? $ogImageMainFile->hashName() : $webSetting->og_image,
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

    public function toggleDebug($value)
    {
        // Ensure value is either 'true' or 'false'
        $value = filter_var($value, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';

        // Update .env
        $this->setEnvironmentValue('APP_DEBUG', $value);

        // Clear config cache to apply change
        Artisan::call('config:clear');

        return response()->json([
            'status' => 'success',
            'APP_DEBUG' => $value
        ]);
    }

    protected function setEnvironmentValue($key, $value)
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            $value = preg_match('/\s/', $value) ? "\"$value\"" : $value;

            file_put_contents(
                $path,
                preg_replace(
                    "/^{$key}=.*/m",
                    "{$key}={$value}",
                    file_get_contents($path)
                )
            );
        }
    }
}
