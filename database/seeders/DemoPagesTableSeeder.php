<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;

class DemoPagesTableSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
                //
                $admin = User::find(1);

                $about_us = new Page([
                        'title' => 'About us',
                        'slug' => '/about-us',
                        'add_to_nav' => true,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);


                $people = new Page([
                        'title' => 'Our People',
                        'slug' => '/our-people',
                        'add_to_nav' => true,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);

                $portfolio = new Page([
                        'title' => 'Our Portfolio',
                        'slug' => '/our-portfolio',
                        'add_to_nav' => true,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);

                $media = new Page([
                        'title' => 'Media',
                        'slug' => '/media',
                        'add_to_nav' => true,
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);

                $contact = new Page([
                        'title' => 'Contact',
                        'slug' => '/contact',
                        'add_to_nav' => true,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);

                $investor_portal = new Page([
                        'title' => 'Investor login',
                        'slug' => '/investor-login',
                        'add_to_nav' => true,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => 'https://dynamoeu.netagesolutions.com/Portal/Login/Cabot_Square/VC-Investors/',
                        'target' => 1
                ]);

                $cookie_policy = new Page([
                        'title' => 'Cookie	 Policy',
                        'slug' => '/cookie-policy',
                        'add_to_nav' => false,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);

                $privacy_policy = new Page([
                        'title' => 'Privacy Policy',
                        'slug' => '/privacy_policy',
                        'add_to_nav' => false,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);
                $esg_policy = new Page([
                        'title' => 'ESG',
                        'slug' => '/esg',
                        'add_to_nav' => false,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);
                $term_conditions = new Page([
                        'title' => 'Terms & Conditions',
                        'slug' => '/terms_conditions',
                        'add_to_nav' => false,
                        'title_nav' => '',
                        'layout' => null,
                        'publish_on' => now(),
                        'published' => true,
                        'approved_on' => now(),
                        'approved_id' => '0',
                        'redirect' => null
                ]);




                $admin->pages()->saveMany([
                        $about_us,
                        $people,
                        $portfolio,
                        $media,
                        $contact,
                        $investor_portal,
                        $cookie_policy,
                        $privacy_policy,
                        $esg_policy,
                        $term_conditions
                ]);
                /*
        $about_us->appendNode($overview);
        $about_us->appendNode($mission);
        $about_us->appendNode($approach);
        $about_us->appendNode($criteria);
        $about_us->appendNode($investors);
		*/
        }
}
