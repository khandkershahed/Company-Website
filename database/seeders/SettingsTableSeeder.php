<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([

            // Admin
            [
                'site_name'         => 'Ngen It',
            'company_name'      => 'Ngen It Ltd.',
            'site_slogan'       => 'Software, License, Solutions, Services & More',
            'meta_description'  => 'Ngen IT - Technology-driven solutions for software, licenses, and services.',
            'logo'              => 'https://www.ngenitltd.com/assets/ngenitfront1/images/logo.png',
            'favicon'           => 'https://www.ngenitltd.com/assets/ngenitfront1/images/favicon.ico',
            'og_image'          => null,
            'phone_one'         => '+88 01714243446',
            'phone_two'         => '(+88) 0258155838',
            'whatsapp_number'   => '+88 01714243446',
            'address'           => "Haque Chamber(11 floor - C&D)\n89/2, Panthapath, Dhaka-1215",
            'currency'          => 'BDT',
            // 'country_id'        => 1, // change based on your country list
            'default_language'  => 'en',
            'contact_email'     => 'support@ngenitltd.com',
            'support_email'     => 'sales@ngenitltd.com',
            'info_email'        => 'info@ngenitltd.com',
            'sales_email'       => 'sales@ngenitltd.com',
            'facebook_url'      => 'https://www.facebook.com/ngenitltd',
            'twitter_url'       => 'https://www.twitter.com/ngenitltd',
            'instagram_url'     => 'https://www.instagram.com/ngenitltd',
            'linkedin_url'      => 'https://www.linkedin.com/company/ngenitltd',
            'youtube_url'       => 'https://www.youtube.com/ngenitltd',
            'github_url'        => 'https://github.com/ngenitltd',
            'portfolio_url'     => 'https://www.ngenitltd.com/portfolio',
            'fiver_url'         => 'https://www.fiverr.com/ngenitltd',
            'upwork_url'        => 'https://www.upwork.com/o/companies/~ngenitltd',
            'service_days'      => 'Saturday - Thursday',
            'service_time'      => '09 AM - 06 PM',
            'created_at'        => now(),
            'updated_at'        => now(),


            ],


        ]);
    }
}
