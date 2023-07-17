<?php

namespace App\Http\Controllers;
use App\Models\MainMenu;
use App\Models\SubMenu;
use App\Models\child_menu;
use App\Models\QuickLink;
use App\Models\content_page;
use App\Models\photo_gallery;
use App\Models\video_gallery;
use App\Models\video_gallery_tittle;
use App\Models\photo_gallery_image;
use App\Models\OrganisationStructure;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Trunc;
use PHPUnit\Framework\Constraint\Count;

class InnerpageController extends Controller
{


//profile

public function profile($sub_menu,$slug)
{

    $item=OrganisationStructure::whereslug($slug)->get();
    //dd($item);
    $type=SubMenu::whereslug($sub_menu)->get();
   // dd($type);
    return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.profile',['type'=>$type,'item'=>$item]);
}




 //screen_reader_access

    public function screen_reader_access()
    {
        return view('front.Layouts.screen_reader_access');
    }

 //main menu

    public function Menu_barInnerpage($slug) //content page
    {
        //return $slug;
        $data=MainMenu::whereslug($slug)->get('link_option');

        if(Count($data)>0){
        $item=content_page::whereid($data[0]->link_option)->get();

        $type=MainMenu::whereslug($slug)->get('name');
            //dd($type);
        return view('front.Layouts.child_pages.menu_bar.main_menu',['item'=>$item,'type'=>$type]);

        }else{
            return abort(401);
        }

    }


//who is who main meun incomplete

    public function whoInnerpagee($slug)   //who is who
    {

        // return $slug;
         $data=MainMenu::whereslug($slug)->get('link_option');

         if(Count($data)>0){
         $item=OrganisationStructure::whereid($data[0]->link_option)->get();

         $type=MainMenu::whereslug($slug)->get('name');
            //dd($type);

         return view('front.Layouts.child_pages.menu_bar.main_menu',['item'=>$item,'type'=>$type]);

        }else{
            return abort(401);
        }
          }


//sub menu

    public function sub_barInnerpage($main_slug,$slug)  //content page sub menu

    {
           //return $slug;


           $data=SubMenu::whereslug($slug)->get('link_option');

           if(Count($data)>0){
           $item=content_page::whereid($data[0]->link_option)->get();

          $type=SubMenu::whereslug($slug)->get();

           return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.submenu',['item'=>$item,'type'=>$type]);
        }else{
            return abort(401);
        }
    }


    public function subinnerpage($main_slug,$slug) //who is who page sub menu
    {

       // return $slug;

       $type=SubMenu::whereslug($slug)->get();

        if(isset($type[0]) && $type[0]->tpl_id == 1){

           // return "governer";

            $item=OrganisationStructure::get();

            $type=SubMenu::whereslug($slug)->get();

           return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.department_info',['item'=>$item,'type'=>$type]);

        }elseif(isset($type[0]) && $type[0]->tpl_id == 3){


            $item=OrganisationStructure::where('department',6)->paginate(9);

            //dd($item);

            $type=SubMenu::whereslug($slug)->get();

            return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.faculty',['item'=>$item,'type'=>$type]);


        }else{


            $data=SubMenu::whereslug($slug)->get();
            if(Count($data)>0){
            $item=OrganisationStructure::whereid($data[0]->link_option)->get();

            $type=SubMenu::whereslug($slug)->get();

           return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.member',['item'=>$item,'type'=>$type]);
        }else{
            return abort(401);
        }

        }


    }



//Child menu

        public function Child_barInnerpage($main_slug,$Sub_slug,$slug) //content page
        {

         //return $slug;

        $data=child_menu::whereslug($slug)->get();
        if(Count($data)>0){
        $item=content_page::whereid($data[0]->link_option)->get();

        $type_sub=child_menu::whereslug($slug)->get();
        //dd($type_sub);

        $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();


        $get=MainMenu::whereid($type_sub[0]->menu_id)->get();

       // dd($get);

        $type_child=child_menu::whereslug($slug)->get();

        return view('front.Layouts.child_pages.menu_bar.child_menu_page.child_menu',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
    }else{
        return abort(401);
    }


    }


    //who is who incomplete


        public function Childinnerpage($main_slug,$Sub_slug,$slug) //who is who page
        {

        if($slug == 'board-of-governors'){

           // return "governer";

              $item=OrganisationStructure::get('link_option');

              $type=child_menu::whereslug($slug)->get('sub_id');

              $menu=child_menu::wheresub_id($type[0]->sub_id)->get('name');


             return view('front.Layouts.child_pages.menu_bar.child_menu_page.department_info',['item'=>$item,'menu'=>$menu]);

          }else{


           // return "directer";

              $data=child_menu::whereslug($slug)->get('link_option');
              if(Count($data)>0){
              $item=OrganisationStructure::whereid($data[0]->link_option)->get();

              $type_sub=child_menu::whereslug($slug)->get('menu_id');

              $type_child=child_menu::whereslug($slug)->get('sub_id');

              return view('front.Layouts.child_pages.menu_bar.child_menu_page.member',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child]);
            }else{
                return abort(401);
            }



            }

        }


//home dashboard in our website


    public function  Academics_Innerpage($slug)
    {
        //return $slug;
        $data=QuickLink::whereslug($slug)->get('link_option');
        //dd($data);
        if(Count($data)>0){
        $item=content_page::whereid($data[0]->link_option)->get();

        //dd($item);
        return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
        }else{
            return abort(401);
        }
    }


    public function  Category_Innerpage($slug)
    {
       // return $slug;

        $data=QuickLink::whereslug($slug)->get('link_option');
        //dd($data);
        if(Count($data)>0){
        $item=content_page::whereid($data[0]->link_option)->get();

         return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
        }else{
            return abort(401);
        }


        //dd($item);

    }




    public function  Footer_info_Innerpage($slug)
    {
        //return $slug;
        $data=QuickLink::whereslug($slug)->get('link_option');
        //dd($data);
        if(Count($data)>0){
        $item=content_page::whereid($data[0]->link_option)->get();
        //dd($item);
        return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
        }else{
            return abort(401);
        }

    }




    public function  Footer_info2_Innerpage($slug)
    {
        //return $slug;
        $data=QuickLink::whereslug($slug)->get('link_option');
        //dd($data);
        if(Count($data)>0){
        $item=content_page::whereid($data[0]->link_option)->get();
        //dd($item);
        return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
        }else{
            return abort(401);
        }

    }


//student inner page

    public function stundent_Innerpage($slug)
    {
          //return $slug;
          $data=QuickLink::whereslug($slug)->get('link_option');
          //dd($data);
          if(Count($data)>0){
           $item=content_page::whereid($data[0]->link_option)->get();
           //dd($item);
         return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
            }else{
                return abort(401);
            }
    }







//url inner page


    public function urls_Innerpage($slug)
    {
          //return $slug;
          $data=QuickLink::whereslug($slug)->get('link_option');
          //dd($data);
          if(Count($data)>0){
           $item=content_page::whereid($data[0]->link_option)->get();
           //dd($item);
         return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
        }else{
            return abort(401);
        }
    }





//photo video inner page


    public function  photo_multi_Innerpage($photo_slug)
    {
              //return $photo_slug;
            $data=photo_gallery::wherephoto_slug($photo_slug)->get("id");
             // dd($data);
             if(Count($data)>0){
           $item=photo_gallery_image::wheregallery_id($data[0]->id)->get();
           //dd($item);
          return view('front.Layouts.inner-page.gallerys.photo-category',['item'=>$item]);
        }else{
            return abort(401);
        }
    }






    public function  photo_Innerpage($slug)
    {
         //return $slug;
         $data=QuickLink::whereslug($slug)->get();

         //dd($data);
         if(Count($data)>0){
        $item=photo_gallery::whereid($data[0]->link_option)->get();
        //dd($item);
        return view('front.Layouts.inner-page.gallerys.photo-miltpage_category',['item'=>$item]);
        }else{
            return abort(401);
        }

    }


//video innner page

    public function  video_Innerpage($slug)
    {
       // return $slug;
        $data=QuickLink::whereslug($slug)->get('link_option');
          //dd($data);
        if(Count($data)>0){
        $item=video_gallery::whereid($data[0]->link_option)->get();
        return view('front.Layouts.inner-page.gallerys.video-category',['item'=>$item]);
        }else{
            return abort(401);
        }
    }

    public function  video_multi_Innerpage($video_slug)
    {
          //return $video_slug;
          $data=video_gallery::wherevideo_slug($video_slug)->get("id");
          //dd($data);
          if(Count($data)>0){
           $item=video_gallery_tittle::wheregallery_id($data[0]->id)->get();
           //dd($item);
        return view('front.Layouts.inner-page.gallerys.video-miltimage',['item'=>$item]);
        }else{
            return abort(401);
        }
    }



    //departmanet  controller
    public function  Add_Department()
    {
        $data=OrganisationStructure::get();

        return view('front.Layouts.inner-page.Director.department_info',['data'=>$data]);
    }

   //sitemap controller

        public function sitemap()
        {

          return view('front.Layouts.Side_Map');

        }


}
