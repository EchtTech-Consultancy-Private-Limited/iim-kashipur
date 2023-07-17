<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                                    \App\Models\Admin::insert([
                                    'name' => 'Super Admin',
                                    'email' => 'superadmin@gmail.com',
                                    'password' => Hash::make('987654321'),
                                    'status' => 1,
                                    ]);

                                    \App\Models\Org::insert([
                                    'name' => 'Echt Tech',
                                    'name_h' => 'Echt Tech',
                                    'address' => 'New Delhi',
                                    'address_h' => 'New Delhi',
                                    'contact' => '7557590075',
                                    'time'=>'09:00am-6:00pm',
                                    'email' => 'superadmin@gmail.com',
                                    'logo' => 'light.png',
                                    'logo2'=>'dark.png',
                                    'fevicon' => 'icon.png',
                                    'facebook'=>'https://www.facebook.com/login/',
                                    'twitter'=>'https://twitter.com/i/flow/login',
                                    'instagram'=>'https://www.instagram.com/',
                                    'youtube'=>'https://www.youtube.com/',
                                    'pintrest'=>'https://in.pinterest.com/',
                                    'linkedin'=>'https://www.linkedin.com/login',
                                    'about'=>'Echt Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With&nbsp'
                                    ]);

                                    \App\Models\BannerSlider::insert([
                                    'type' => 'Banners',
                                    'title' => 'Banner1',
                                    'short' => 'this is best production field compony',   
                                    'status' => '1',
                                    'linkbutton' => 'https://youtu.be/jpYkoa-uE_c',
                                    'heading1' => 'product compony',
                                    'heading2'=>'production',
                                    'get_in_touch'=>'https://www.instagram.com/',
                                    'url'=>'banner/slider1.jpg',
                                    'image' =>'slider1.jpg',
                                    'video_url'=>'https://youtu.be/jpYkoa-uE_c',


                                    ]);

                                    \App\Models\BannerSlider::insert([
                                    'type' => 'Banners',
                                    'title' => 'Banner2',
                                    'short' => 'this is best production field compony',   
                                    'status' => '1',
                                    'linkbutton' => 'https://youtu.be/jpYkoa-uE_c',
                                    'heading1' => 'product compony',
                                    'heading2'=>'production',
                                    'url'=>'banner/slider2.jpg',
                                    'image' =>'slider2.jpg',
                                    'get_in_touch'=>'https://www.instagram.com/',
                                    'video_url'=>'',


                                    ]);


                                    \App\Models\MainMenu::insert([
                                    'name' => 'about us',
                                    'name_h' => 'about us',
                                    'slug' => 'about-us',
                                    'url' => '/content-page',
                                    'external'=>'',       
                                    'status' => '1',
                                    'link_type' => '0',
                                    'link_option' => '1',
                                    'sort_order'=>'1',


                                    ]);


                                    \App\Models\child_menu::insert([
                                    'menu_id' => '1',
                                    'sub_id' => '1',
                                    'name' => 'grand-child-about-us',
                                    'url' => '/content-page/child-about-us/grand-child-about-us',
                                    'slug'=>'grand-child-about-us',       
                                    'status' => '1',
                                    'external' => '',



                                    ]); 

                                    \App\Models\SubMenu::insert([
                                    'name' => 'child about-us',
                                    'name_h' => 'child about-us',
                                    'slug' => 'child-about-us',
                                    'url' => '/content-page/child-about-us',
                                    'external'=>'',       
                                    'status' => '1',
                                    'menu_id'=>'1',


                                    ]);


//menu bar section data

                                            \App\Models\quick_linkcategory::insert([

                                              

                                            'Section' =>'services',
                                            'placement' =>'menu-section',
                                            'sort_order' => '1',
                                            'status' => '1', 
                                            'short_note'=>'using the mordern technogoly & modern framwork'   
                                            ]);


                                            \App\Models\QuickLink::insert([

                                            'title' => 'plannig',
                                            'url'=>'',
                                            'quick_category' =>'content-page',
                                            'link_option'=>'1',   
                                            'link_category' =>'8',
                                            'image' =>'167240073850.jpg',  
                                            'status'=>'1'   

                                            ]);



//header box seeder data

                                        \App\Models\quick_linkcategory::insert([

                                        'Section' => 'First_Box_section',
                                        'placement' => 'Box_section',
                                        'sort_order' => '1',
                                        'status' => '1',    
                                        ]);


                                        \App\Models\QuickLink::insert([

                                        'title' => 'Consulting',
                                        'url' => 'content-page/Consulting',
                                        'quick_category' => 'content-page',
                                        'link_option'=>'1',   
                                        'link_category' =>'1',
                                        'short' => 'Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac nibh luctus, in porttitor theo lacus egestas.',
                                        'image' => '167239375122.jpg',  
                                        'status'=>'1'   

                                        ]);


//services section in top       


                                    \App\Models\quick_linkcategory::insert([

                                    'Section' => 'SERVICES',
                                    'placement' => 'service_first_section',
                                    'sort_order' => '1',
                                    'status' => '1', 
                                    'short_note'=>'SERVICES We Are Offering All Kinds of IT Solutions Services'   
                                    ]);


                                    \App\Models\QuickLink::insert([

                                    'title' => 'Software Development',
                                    'url' => 'content-page/Software Development',
                                    'quick_category' => 'content-page',
                                    'link_option'=>'1',   
                                    'link_category' =>'2',
                                    'short' => 'We denounce with righteous indignation and dislike men who are so beguiled and demo ralized your data.',
                                    'image' => '167239605995.jpg',  
                                    'status'=>'1'   

                                    ]);


//services bottom section 


                                        \App\Models\quick_linkcategory::insert([

                                        'Section' => 'WORKING PROCESS',
                                        'placement' => 'service_second_section',
                                        'sort_order' => '1',
                                        'status' => '1', 
                                        'short_note'=>'Working Process - Echt Tech Always Dedicated Towords Work For Customers'   
                                        ]);


                                        \App\Models\QuickLink::insert([
                                        'url'=>'',
                                        'quick_category' => 'content-page',
                                        'link_option'=>'1',   
                                        'link_category' =>'3',
                                        'short' => 'Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac nibh luctus, in porttitor theo lacus egestas.',
                                        'image' => '167239900073.png',  
                                        'status'=>'1'   

                                        ]);


//pricing section data 


                                        \App\Models\quick_linkcategory::insert([

                                        'Section' => 'pricing',
                                        'placement' =>'Pricing_section',
                                        'sort_order' => '1',
                                        'status' => '1', 
                                        'short_note'=>'Our Pricing Plan'   
                                        ]);


                                        \App\Models\QuickLink::insert([

                                        'title' => 'Software Development',
                                        'url' => 'content-page/Software Development',
                                        'quick_category' => 'content-page',
                                        'link_option'=>'1',   
                                        'link_category' =>'4',
                                        'image' => '167239908181.png',  
                                        'rupess'=>'200',
                                        'start_section' =>'star from',
                                        'status'=>'1'   

                                        ]);

//project section data

                                    \App\Models\quick_linkcategory::insert([
                                        
                                    'Section' => 'project',
                                    'placement' =>'project_section',
                                    'sort_order' => '1',
                                    'status' => '1', 
                                    'short_note'=>'Working Process - Echt Tech Always Dedicated Towords Work For Customers'   
                                    ]);


                                    \App\Models\QuickLink::insert([

                                    'title' => 'It software',
                                    'url'=>'',
                                    'quick_category' => 'content-page',
                                    'link_option'=>'1',   
                                    'link_category' =>'5',
                                    'image' =>'167239948946.jpg',  
                                    'status'=>'1'   

                                    ]);


 //project logo section 

                                    \App\Models\project_logo::insert([
                                        'image'=> 'about-4.png',  
                                        'name'=>'HAPPY CLIENTS',
                                        'number'=>'12',
                                        'status'=>'1'

                                    ]);


 //blog section data

                            \App\Models\quick_linkcategory::insert([
                                        
                                'Section' => 'BLOGS',
                                'placement' =>'blog_section',
                                'sort_order' => '1',
                                'status' => '1', 
                                'short_note'=>'Read Our Latest Tips & Tricks'   
                            ]);


                            \App\Models\QuickLink::insert([

                                'title' => 'It services',
                                'url'=>'',
                                'quick_category' => 'content-page',
                                'link_option'=>'1',   
                                'link_category' =>'6',
                                'image' =>'167239999515.jpg',  
                                'status'=>'1'   
                                
                            ]);



 //footer section data

                        \App\Models\quick_linkcategory::insert([

                        'Section' =>'about',
                        'placement' =>'footer_bottom_section',
                        'sort_order' => '1',
                        'status' => '1', 
                        'short_note'=>'using the mordern technogoly & modern framwork'   
                        ]);


                        \App\Models\QuickLink::insert([

                        'title' => 'contact us',
                        'url'=>'',
                        'quick_category' => 'content-page',
                        'link_option'=>'1',   
                        'link_category' =>'7',
                        'image' => '167240010596.jpg',  
                        'status'=>'1'   

                        ]);


        \App\Models\content_page::insert([

            'name' =>'echtteh servies',
            'name_h' =>'echtteh servies',
            'content' =>'Echt Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical Expertise',
            'content_h' =>'इचट टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां रचनात्मक प्रतिभाएं तकनीकी विशेषज्ञता के साथ मिश्रित होती हैं',
            'cover_image'=>'about-4.png',   
            'cover_title' =>'title',
            'cover_alt' => 'alt',
            'banner_image' => 'about-4.png',   
            'banner_title'=>'title' , 
            'banner_alt' => 'alt',
            'file_download' => 'file.pdf',
            'meta_title' => 'title',
            'meta_keywords' => 'keywords', 
            'meta_description' => 'description ',
            'parent_id' => '0',
            'sort_order' => '1',
            'status' => '1',
            
        ]);

        
        \App\Models\video_gallery::insert([

            'name' =>'echtteh-video-section',
            'name_h' =>'echtteh servies',
            'content' =>'Echt Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical Expertise',
            'content_h' =>'इचट टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां रचनात्मक प्रतिभाएं तकनीकी विशेषज्ञता के साथ मिश्रित होती हैं',
            'cover_image'=>'about-4.png',   
            'cover_title' =>'title',
            'cover_alt' => 'alt',
            'banner_image' => 'about-4.png',   
            'banner_title'=>'title' , 
            'banner_alt' => 'alt',
            'file_download' => 'file.pdf',
            'meta_title' => 'title',
            'meta_keywords' => 'keywords', 
            'meta_description' => 'description ',
             'slug'=>'echtteh-video-section',
            'sort_order' => '1',
            'status' => '1',
            
        ]);

        \App\Models\photo_gallery::insert([

            'name' =>'echtteh gallery',
            'name_h' =>'echtteh gallery',
            'content' =>'Echt Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical Expertise',
            'content_h' =>'इचट टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां रचनात्मक प्रतिभाएं तकनीकी विशेषज्ञता के साथ मिश्रित होती हैं',
            'cover_image'=>'about-4.png',   
            'cover_title' =>'title',
            'cover_alt' => 'alt',
            'banner_image' => 'about-4.png',   
            'banner_title'=>'title' , 
            'banner_alt' => 'alt',
            'file_download' => 'file.pdf',
            'meta_title' => 'title',
            'meta_keywords' => 'keywords', 
            'meta_description' => 'description ',
            'slug'=>'echtteh-gallery-section',
            'sort_order' => '1',
            'status' => '1',
            
        ]);

        \App\Models\blog ::insert([

            'name' =>'echtteh blog',
            'name_h' =>'echtteh blog',
            'content' =>'Echt Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical ExpertiseEcht Tech is an ISO 9001:2015 certified and registered with startupindia. The Hub Of Excellent Solutions Where Creative Talents Blend With Technical Expertise',
            'content_h' =>'इचट टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां तकनीकी विशेषज्ञता के साथ रचनात्मक प्रतिभाओं का मिश्रण होता है। एक टेक एक आईएसओ 9001:2015 प्रमाणित है और स्टार्टअपइंडिया के साथ पंजीकृत है। उत्कृष्ट समाधानों का केंद्र जहां रचनात्मक प्रतिभाएं तकनीकी विशेषज्ञता के साथ मिश्रित होती हैं',
            'cover_image'=>'about-4.png',   
            'cover_title' =>'title',
            'cover_alt' => 'alt',
            'banner_image' => 'about-4.png',   
            'banner_title'=>'title' , 
            'banner_alt' => 'alt',
            'file_download' => 'file.pdf',
            'meta_title' => 'title',
            'meta_keywords' => 'keywords', 
            'meta_description' => 'description ',
            'slug'=>'echtteh-gallery-section',
            'sort_order' => '1',
            'status' => '1',
            
        ]);

        



       DB::table('roles')->insert([
            'name' => 'Super Admin',
            'guard_name' => 'admin',
        ]);
       DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' =>'App\Models\Admin',
            'model_id' => 1,
       ]);


         \App\Models\OptionsDump::insert([
        [   'main' => 'Banner/Sliders',
            'option' => 'Front Images',
            'table_name' => 'banner_sliders',
        ],
        [
            'main' => 'Banner/Sliders',
            'option' => 'Client Logos',
            'table_name' => 'banner_sliders',
        ],
        [
            'main' => 'Banner/Sliders',
            'option' => 'Banners',
            'table_name' => 'banner_sliders',
        ],
        [
            'main' => 'Organisation Structure',
            'option' => 'Who is Who',
             'table_name' => 'organisation_structures',
        ],

        [
            'main' => 'Announcements',
            'option' => 'Notifications',
            'table_name' => 'announcements',
        ],

         [
            'main' => 'Announcements',
            'option' => 'Circulars',
            'table_name' => 'announcements',
        ],

//my code 

        [
            'main' => 'Announcements',
            'option' => 'Working_plan',
            'table_name' => 'announcements',
        ],

        [
            'main' => 'Announcements',
            'option' => 'Working_plan',
            'table_name' => 'announcements',
        ],


         [
            'main' => 'Announcements',
            'option' => 'Latest Updates',
            'table_name' => 'announcements',
        ],

         [
            'main' => 'Announcements',
            'option' => 'Events',
            'table_name' => 'announcements',
        ],
        [
            'main' => 'Content Pages',
            'option' => 'Content Pages',
            'table_name' => 'content_page',
        ],
        [
            'main' => 'Photo Gallery',
            'option' => 'Photo Gallery',
            'table_name' => 'photo_gallery',
        ],
        [
            'main' => 'Video Gallery',
            'option' => 'Video Gallery',
            'table_name' => 'video_gallery',
        ],
        [
            'main' => 'blog',
            'option' => 'blog',
            'table_name' => 'blog',
        ],
        
        ]);

          \App\Models\URLList::insert([
        [  
             'url' => 'front-images',
             'table_name' => 'banner_sliders',
             'type'=>'Front Images'
        ],

         [  
             'url' => 'client-logos',
             'table_name' => 'banner_sliders',
             'type'=>'Client Logos'
        ],

         [  
             'url' => 'banners',
             'table_name' => 'banner_sliders',
             'type'=>'Banners'
        ],

         [  
             'url' => 'who-is-who',
             'table_name' => 'organisation_structures',
             'type'=>'Who is Who'
        ],

           [  
             'url' => 'notifications',
             'table_name' => 'announcements',
             'type'=>'Notifications'
        ],

           [  
             'url' => 'circulars',
             'table_name' => 'announcements',
             'type'=>'Circulars'
        ],

          [  
             'url' => 'latest-updates',
             'table_name' => 'announcements',
             'type'=>'Latest Updates'
        ],

          [  
             'url' => 'events',
             'table_name' => 'announcements',
             'type'=>'Events'
        ],

        [
            'url' => 'content-page',
            'table_name' => 'content_pages',
            'type' => 'Content Page',
        ],
        [
            'url' => 'photo-gallery',
            'table_name' => 'photo_galleries',
            'type' => 'Photo Gallery',
        ],
        [
            'url' => 'video-gallery',
            'table_name' => 'video_galleries',
            'type' => 'Video Gallery',
        ],

        [
            'url' => 'blog',
            'table_name' => 'blogs',
            'type' => 'blog',
        ],
        ]);
    }
}
