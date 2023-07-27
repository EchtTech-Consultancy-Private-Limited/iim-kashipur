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
use App\Models\feedback;
use App\Models\StudentProfile;
use App\Models\photo_gallery_image;
use App\Models\OrganisationStructure;
use App\Models\multiple_profile;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Trunc;
use PHPUnit\Framework\Constraint\Count;
use App\Models\club;
use App\Models\cell;
use App\Models\commmittee;
use App\Models\org_journies;
use App\Models\club_multiple_image;
use App\Models\committee_multiple_image;
use App\Models\cell_multiple_image;
use App\Models\press_media;
use App\Models\news_event;
use App\Models\subchildmenu;
use App\Models\Tender;
use App\Models\Vendorsdebarred;
use App\Models\Career;

use App\Models\Events;
use App\Models\event_image;
use App\Models\Industry;

use App\Models\student_council;
use App\Models\journal_publication;
use App\Models\journal_publication_child;
use App\Models\anti_raggings;
use App\Models\wellness_facilitie;
use App\Models\wellness_facilitie_image;
use App\Models\rti;
use App\Models\rit_report_section;
use App\Models\quarter_report;

class InnerpageController extends Controller
{

// public function master_page()
// {
//   return view('front.Layouts.child_pages.menu_bar.main_menu.master');
// }
//
//
//
//Monu - 12-07-2023
public function RTI_view()
    {
        $item=rti::wherestatus('1')->get();
        $data=rit_report_section::get();
        $value=quarter_report::get();
		//dd($value);
        return view('front.Layouts.child_pages.menu_bar.main_menu.rti',['item'=>$item,'data'=>$data,'value'=>$value]);
    }


    public function Facilities()
    {
        $data=wellness_facilitie::get();
        $chairpersons=OrganisationStructure::where('wellness_cootdiantors','=','1')->get();
        $item=wellness_facilitie_image::whereparent_id($data[0]->id)->get();

        return view('front.Layouts.child_pages.menu_bar.main_menu.wellness_facilitie',['data'=>$data,'item'=>$item,'chairpersons'=>$chairpersons]);
    }

    public function anti_raggings()
    {
      $data=anti_raggings::get();
      return view('front.Layouts.child_pages.menu_bar.main_menu.anti-ragging-policy',['data'=>$data]);
    }

    public function journal_detail($id)
    {
       $item =journal_publication_child::where('parent_id',dDecrypt($id))->get();
       $data=journal_publication::where('id',dDecrypt($id))->get();
       return view('front.Layouts.child_pages.menu_bar.main_menu.jounral',['item'=>$item,'data'=>$data]);

    }






public function  career(){

    $item=Career::wherestatus('1')->paginate(10);
    return view('front.Layouts.child_pages.menu_bar.main_menu.career',['item'=>$item]);


}
//Industry_Connect

    public function Industry_Connect()
    {
        $item=Industry::get();
        return view('front.Layouts.child_pages.menu_bar.main_menu.Industry_connect',['item'=>$item]);
    }

//evnet& activity
    public function event_activity_image($id)
    {
        $data=event_image::whereparent_id(dDecrypt($id))->get();
        $item=Events::whereid(dDecrypt($id))->get();
        return view('front.Layouts.child_pages.menu_bar.main_menu.event&activity_image',['data'=>$data,'item'=>$item]);
    }
// Tenders
public function  Tenders(){

    $item=Tender::wherestatus('1')->paginate(10);
    return view('front.Layouts.child_pages.menu_bar.main_menu.Tenders',['item'=>$item]);

}

// Vendors Debarred
public function  Vendors_Debarred(){

     $item=Vendorsdebarred::wherestatus('1')->paginate(10);
     return view('front.Layouts.child_pages.menu_bar.main_menu.Vendors_Debarred',['item'=>$item]);
}

//press &media
public function press_media()
{

    $item=press_media::get();
    if(count($item)){
        $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
        $chairpersons=OrganisationStructure::where('MEDIA_COORDINATORS','=','1')->get();

    return view('front.Layouts.child_pages.menu_bar.main_menu.Press&media',['item'=>$item,'chairperson'=>$chairperson,'chairpersons'=>$chairpersons]);
    }else{
        return abort(401);
    }
}
public function sub_childInnerpage($main_slug,$slug,$subchild,$superchild)  //content page superchild menu
{

    $subchildmenu=subchildmenu::whereslug($superchild)->get();
    if(Count($subchildmenu)>0)
    {
        if(Count($subchildmenu)>0)
            {
                $type=subchildmenu::whereslug($superchild)->get();
                $subchildmenu=subchildmenu::whereslug($subchildmenu)->get('link_option');
                $item=content_page::whereid($type[0]->link_option)->get();
                $menu=MainMenu::whereslug($main_slug)->get();
                $sub=SubMenu::whereslug($slug)->get();
                $child=child_menu::whereslug($subchild)->get();
                if(count($item)>0){
                return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['subchildmenu'=>$subchildmenu,'child'=>$child,'sub'=>$sub,'menu'=>$menu,'item'=>$item,'type'=>$type]);
            }
                else
                {
                    return abort(401);
                }
            }
    }

}

//
public function news_media()
{
    $item=news_event::get();
    return view('front.Layouts.child_pages.menu_bar.main_menu.News_details',['item'=>$item]);
}


//sitemap controller

public function sitemap()
{
return view('front.Layouts.Side_Map');
}


//feedback form

public function feedback_page()
{
    return view('front.Layouts.feedback');
}



//add feedback data
public function add_feedback(Request $request)
{
    $request->validate(
        [
            'name' => 'required|max:32|min:2',
            'email' => ['required','string','email','max:50','unique:users','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'mobile_no'=>'required|numeric|min:10|numeric|digits:10',
            'Type'=>'required',
            'feedback'=>'required',
            'captcha' => 'required|captcha'
       ]
   );
    $data= new feedback;
    $data->name=$request->name;
    $data->form_type=$request->form_type;
    $data->email=$request->email;
    $data->mobile_no=$request->mobile_no;
    $data->Type=$request->Type;
    $data->feedback=$request->feedback;
    $data->save();
    return back()->with(['success'=>'Feedback Add Successfully!']);
}

//countact us form
public function contact_page()
{
    return view('front.Layouts.contact_us');
}

public function add_contact(Request $request)
{
    $request->validate(
        [
        'name' => 'required|max:32|min:2',
        'email' => ['required','string','email','max:50','unique:users','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
        'mobile_no'=>'required|numeric|min:10|numeric|digits:10',
        'Type'=>'required',
        'feedback'=>'required',
        'captcha' => 'required|captcha'
       ]
   );
    $data= new feedback;
    $data->name=$request->name;
    $data->email=$request->email;
    $data->form_type=$request->form_type;
    $data->Type=$request->Type;
    $data->mobile_no=$request->mobile_no;
    $data->feedback=$request->feedback;
    $data->save();
    return back()->with(['success'=>'Contact Us Add Successfully!']);
}

//screen_reader_access

public function screen_reader_access()
{
    return view('front.Layouts.screen_reader_access');
}



//profile

// public function profile($sub_menu,$slug)
// {
//     $item=OrganisationStructure::whereslug($slug)->get();
//     dd($item);
//     if(count($item) > 0)
//     $data=multiple_profile::whereparent_id($item[0]->id)->get();
//     $type=SubMenu::whereslug($sub_menu)->get();
//     return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.profile',['type'=>$type,'item'=>$item,'data'=>$data]);
// }


 //main menu
   /* public function Menu_barInnerpage($slug) //content page & who in who data
    {

        $main_menu="main-menu";
        $item=OrganisationStructure::whereslug($slug)->get();


        if(MainMenu::whereslug($slug)->get('id')->count()){

            $type=MainMenu::whereslug($slug)->get();
            if($type[0]->url == '/content-page'){
               // dd('hii');
                $item=content_page::whereid($type[0]->link_option)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

            }elseif($type[0]->url == '/who-is-who')
            {

                if(isset($type[0]) && $type[0]->tpl_id == 1) //board of gerverner
                {
                  //  return "Board of directer";
                    $item=OrganisationStructure::get();
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.department_info',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{
                        return abort(401);
                    }
                }
                elseif(isset($type[0]) && $type[0]->tpl_id == 2)     //directer profile
                {
                    //return 'member';

                    $item=OrganisationStructure::whereid($type[0]->link_option)->get();
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);
                    }else{
                        return abort(401);
                    }

                }
                elseif(isset($type[0]) && $type[0]->tpl_id == 3){     // factulty directry

                    //dd('hii');
                    $item=OrganisationStructure::where('department',6)->paginate(9);
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.faculty',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{
                        return abort(401);
                    }

                }elseif(isset($type[0]) && $type[0]->tpl_id == 4){    //visiting faculty

                    $item=OrganisationStructure::where('department',7)->paginate(9);
                    if(count($item)>0){


                    return view('front.Layouts.child_pages.menu_bar.main_menu.visiting_faculity',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{

                        return abort(401);

                    }
                }elseif(isset($type[0]) && $type[0]->tpl_id == 5){    //the Team


                    $item=OrganisationStructure::get();

                    if(count($item)>0){


                    return view('front.Layouts.child_pages.menu_bar.main_menu.internation_team',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{

                        return abort(401);

                    }

                }else{

                    $item=OrganisationStructure::whereid($type[0]->link_option)->get();
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);
                    }else{
                        return abort(401);
                    }

                }

            // else{

            //     $org=OrganisationStructure::whereid($type[0]->link_option)->get();
            //     $type=MainMenu::whereslug($slug)->get();
            //     return view('front.Layouts.child_pages.menu_bar.main_menu',['org'=>$org,'type'=>$type]);
            // }
            }
        }
		//dd('Hello');
		elseif(Count($item)>0){


          //faculty profile section user main menu
           $item=OrganisationStructure::whereslug($slug)->get();
            if(count($item) > 0){
            $data=multiple_profile::whereparent_id($item[0]->id)->get();
            return view('front.Layouts.profile',['item'=>$item,'data'=>$data,'main_menu'=>$main_menu]);
            }else{
                return abort(401);
            }

        }

        elseif(QuickLink::whereslug($slug)->get()->count()){

                //  dd(QuickLink::whereslug($slug)->get());

                    if(QuickLink::whereslug($slug)->first('section_name')->section_name == 'academics'){

                      // dd('hii');
                        $data=QuickLink::whereslug($slug)->get();
                        if(Count($data)>0){
                        $item=content_page::whereid($data[0]->link_option)->get();
                        if(Count($item)>0){
                        return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                        }else{
                            return abort(401);
                        }

                        }
                        else{
                            return abort(401);
                        }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'student-corner')
                    {

                           $data=QuickLink::whereslug($slug)->get('link_option');
                            //dd($data);
                            if(Count($data)>0){
                            $item=content_page::whereid($data[0]->link_option)->get();
                            if(Count($item)>0){
                            return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                                }else{
                                    return abort(401);
                                }
                            }else{
                                return abort(401);
                            }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'notice-category')
                    {

                          //return $slug;

                                $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                            if(Count($data)>0){
                                $item=content_page::whereid($data[0]->link_option)->get();
                                if(Count($item)>0){
                                    return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                                }else{
                                    return abort(401);
                                }
                            }else{
                                return abort(401);
                            }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'info')
                    {

                            // return $slug;
                             $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                            if(Count($data)>0){

                                $item=content_page::whereid($data[0]->link_option)->get();

                                if(Count($item)>0){
                                //dd($item);
                                return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);


                                }else{
                                    return abort(401);
                                }


                            }else{
                                return abort(401);
                            }
                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'info2')
                    {

                                $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                                if(Count($data)>0){
                                $item=content_page::whereid($data[0]->link_option)->get();

                                $data=content_page::whereparent_id($item[0]->id)->get();

                                if(Count($item)>0){

                                return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item,'data'=>$data]);

                                }else{
                                    return abort(401);
                                }

                            }else{
                                return abort(401);
                            }
                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'centers')
                    {



                         // dd('center');
                                $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                                if(Count($data)>0){
                                $item=content_page::whereid($data[0]->link_option)->get();
                                //dd($item);
                                if(Count($item)>0){
                                return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                                }else{
                                    return abort(401);
                                }


                            }else{
                                return abort(401);
                            }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'photo-gallery')
                    {

                        $photo_slug=QuickLink::whereslug($slug)->get();
                        $data=photo_gallery::whereid($photo_slug[0]->link_option)->get();

                        if(Count($data) >0){
                        $item=photo_gallery_image::wheregallery_id($data[0]->id)->get();

                            if(Count($item)>0){
                            return view('front.Layouts.inner-page.gallerys.photo-category',['item'=>$item]);
                                }else{
                                return abort(401);
                            }
                        }else{
                            return abort(401);
                        }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'video-gallery')
                    {

                        // dd($slug);

                        $video_slug=QuickLink::whereslug($slug)->get();
                        $data=video_gallery::whereid($video_slug[0]->link_option)->get();

                          if(Count($data)>0){
                           $item=video_gallery_tittle::wheregallery_id($data[0]->id)->get();


                              if(Count($item)>0){
                                return view('front.Layouts.inner-page.gallerys.video-miltimage',['item'=>$item]);
                              }else{
                                  return abort(401);
                              }
                          }else{
                              return abort(401);
                          }

                    }
                    else{

                        if(club::whereslug($slug)->get()->count()){    //club single

                        $item=club::whereslug($slug)->get();
                        if(count($item) >0){
                        $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                        $chairpersons=OrganisationStructure::whereClub($item[0]->id)->get();
                        $data=club_multiple_image::whereparent_id($item[0]->id)->get();
                        return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                        }else{
                            return abort(401);
                        }
            }

            elseif(commmittee::whereslug($slug)->get()->count()){    //commitee single

                $item=commmittee::whereslug($slug)->get();
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::wherecommittee($item[0]->id)->get();
                $data=committee_multiple_image::whereparent_id($item[0]->id)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }
            elseif(cell::whereslug($slug)->get()->count()){    //cell single

                $item=cell::whereslug($slug)->get();
               // dd($item);
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::whereCell($item[0]->id)->get();
               // dd($chairpersons);
                $data=cell_multiple_image::whereparent_id($item[0]->id)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }


                        //return abort(402);
                    }
					}else{

           if(club::whereslug($slug)->get()->count()){    //club single


                $item=club::whereslug($slug)->get();
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::whereClub($item[0]->id)->get();
                $data=club_multiple_image::whereparent_id($item[0]->id)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }
            elseif(commmittee::whereslug($slug)->get()->count()){    //commitee single
                $item=commmittee::whereslug($slug)->get();
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::wherecommittee($item[0]->id)->get();
                $data=committee_multiple_image::whereparent_id($item[0]->id)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }
            elseif(cell::whereslug($slug)->get()->count()){    //cell single

                $item=cell::whereslug($slug)->get();
               // dd($item);
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::whereCell($item[0]->id)->get();
               // dd($chairpersons);
                $data=cell_multiple_image::whereparent_id($item[0]->id)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }
        }


        }


//gallery ka ander ka url
        elseif(photo_gallery::wherephoto_slug($slug)->get()->count())
        {
           // dd("hii");
            $data=photo_gallery::wherephoto_slug($slug)->get();
            if(Count($data) >0){
            $item=photo_gallery_image::wheregallery_id($data[0]->id)->get();
           //dd($item);
                if(Count($item)>0){
                return view('front.Layouts.inner-page.gallerys.photo-category',['item'=>$item]);
                    }else{
                    return abort(401);
                }
            }else{
                return abort(401);
            }


        }elseif(video_gallery::wherevideo_slug($slug)->get()->count())
        {


            $data=video_gallery::wherevideo_slug($slug)->get("id");
               //dd($data);
            if(Count($data)>0){
             $item=video_gallery_tittle::wheregallery_id($data[0]->id)->get();

            if(Count($item)>0){
            return view('front.Layouts.inner-page.gallerys.video-miltimage',['item'=>$item]);
            }else{
                return abort(401);
            }
            }else{
                return abort(401);
            }
        }

}*/
 public function Menu_barInnerpage($slug) //content page & who in who data
    {

        $main_menu="main-menu";
        $item=OrganisationStructure::whereslug($slug)->get();
        if(MainMenu::whereslug($slug)->get('id')->count()){

            $type=MainMenu::whereslug($slug)->get();
            if($type[0]->url == '/content-page'){
               // dd('hii');
                $item=content_page::whereid($type[0]->link_option)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

            }elseif($type[0]->url == '/who-is-who')
            {


                if(isset($type[0]) && $type[0]->tpl_id == 1) //board of gerverner
                {
                  //  return "Board of directer";
                    $item=OrganisationStructure::get();
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.department_info',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{
                        return abort(401);
                    }
                }
                elseif(isset($type[0]) && $type[0]->tpl_id == 2)     //directer profile
                {
                    //return 'member';

                    $item=OrganisationStructure::whereid($type[0]->link_option)->get();
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);
                    }else{
                        return abort(401);
                    }

                }
                elseif(isset($type[0]) && $type[0]->tpl_id == 3){     // factulty directry

                    //dd('hii');
                    $item=OrganisationStructure::where('department',6)->paginate(9);
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.faculty',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{
                        return abort(401);
                    }

                }elseif(isset($type[0]) && $type[0]->tpl_id == 4){    //visiting faculty

                    $item=OrganisationStructure::where('department',7)->paginate(9);
                    if(count($item)>0){


                    return view('front.Layouts.child_pages.menu_bar.main_menu.visiting_faculity',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{

                        return abort(401);

                    }
                }elseif(isset($type[0]) && $type[0]->tpl_id == 5){    //the Team


                    $item=OrganisationStructure::get();

                    if(count($item)>0){


                    return view('front.Layouts.child_pages.menu_bar.main_menu.internation_team',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

                    }else{

                        return abort(401);

                    }

                }else{

                    $item=OrganisationStructure::whereid($type[0]->link_option)->get();
                    if(count($item)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);
                    }else{
                        return abort(401);
                    }

                }
            }
        }elseif(Count($item)>0){

          //dd('faculty profile section user main menu');
            $item=OrganisationStructure::whereslug($slug)->get();
            if(count($item) > 0){
            $data=multiple_profile::whereparent_id($item[0]->id)->get();
            return view('front.Layouts.profile',['item'=>$item,'data'=>$data,'main_menu'=>$main_menu]);
            }else{
                return abort(401);
            }
        }
        elseif(QuickLink::whereslug($slug)->get()->count()){

                //  dd(QuickLink::whereslug($slug)->get());

                    if(QuickLink::whereslug($slug)->first('section_name')->section_name == 'academics'){

                      // dd('hii');
                        $data=QuickLink::whereslug($slug)->get();
                        if(Count($data)>0){
                        $item=content_page::whereid($data[0]->link_option)->get();
                        if(Count($item)>0){
                        return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                        }else{
                            return abort(401);
                        }

                        }
                        else{
                            return abort(401);
                        }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'student-corner')
                    {

                           $data=QuickLink::whereslug($slug)->get('link_option');
                            //dd($data);
                            if(Count($data)>0){
                            $item=content_page::whereid($data[0]->link_option)->get();
                            if(Count($item)>0){
                            return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                                }else{
                                    return abort(401);
                                }
                            }else{
                                return abort(401);
                            }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'notice-category')
                    {

                          //return $slug;

                                $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                            if(Count($data)>0){
                                $item=content_page::whereid($data[0]->link_option)->get();
                                if(Count($item)>0){
                                    return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                                }else{
                                    return abort(401);
                                }
                            }else{
                                return abort(401);
                            }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'info')
                    {

                            // return $slug;
                             $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                            if(Count($data)>0){

                                $item=content_page::whereid($data[0]->link_option)->get();

                                if(Count($item)>0){
                                //dd($item);
                                return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);


                                }else{
                                    return abort(401);
                                }


                            }else{
                                return abort(401);
                            }
                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'info2')
                    {

                                $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                                if(Count($data)>0){
                                $item=content_page::whereid($data[0]->link_option)->get();

                                $data=content_page::whereparent_id($item[0]->id)->get();

                                if(Count($item)>0){

                                return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item,'data'=>$data]);

                                }else{
                                    return abort(401);
                                }

                            }else{
                                return abort(401);
                            }
                    }
						elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'centers')
                    {

                         // dd('center');
                                $data=QuickLink::whereslug($slug)->get('link_option');
                                //dd($data);
                                if(Count($data)>0){
                                $item=content_page::whereid($data[0]->link_option)->get();
                                //dd($item);
                                if(Count($item)>0){
                                return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
                                }else{
                                    return abort(401);
                                }


                            }else{
                                return abort(401);
                            }

                    }

                    elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'photo-gallery')
                    {


                        $photo_slug=QuickLink::whereslug($slug)->get();
                        $data=photo_gallery::whereid($photo_slug[0]->link_option)->get();
                        if(Count($data) >0){
                        $item=photo_gallery_image::wheregallery_id($data[0]->id)->get();

                            if(Count($item)>0){
                            return view('front.Layouts.inner-page.gallerys.photo-category',['item'=>$item,'data'=>$data]);
                                }else{
                                return abort(401);
                            }
                        }else{
                            return abort(401);
                        }

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'video-gallery')
                    {

                           // dd(QuickLink::whereslug($slug)->first('section_name')->section_name == 'video-gallery');

                        $video_slug=QuickLink::whereslug($slug)->get();
                        $data=video_gallery::whereid($video_slug[0]->link_option)->get();
                          if(Count($data)>0){
                           $item=video_gallery_tittle::wheregallery_id($data[0]->id)->get();


                              if(Count($item)>0){
                                return view('front.Layouts.inner-page.gallerys.video-miltimage',['item'=>$item,'data'=>$data]);
                              }else{
                                  return abort(401);
                              }
                          }else{
                              return abort(401);
                          }

                     }
                    elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'header-top')
                    {
                        $video_slug=QuickLink::whereslug($slug)->get();

                        $item=video_gallery::whereid($video_slug[0]->link_option)->get();

                          if(Count($item)>0){
                           $values=video_gallery_tittle::wheregallery_id($item[0]->id)->get();

                              if(Count($item)>0){
                                return view('front.Layouts.child_pages.menu_bar.main_menu.video_master',['video_slug'=>$video_slug,'item'=>$item,'values'=>$values]);
                              }else{
                                  return abort(401);
                              }
                          }else{
                              return abort(401);
                          }

                    }
                    else{

                        return abort(402);
                    }


        }
        //gallery ka ander ka url
        elseif(photo_gallery::wherephoto_slug($slug)->get()->count())
        {
           // dd("hii");
            $data=photo_gallery::wherephoto_slug($slug)->get();
           // dd($data);
            if(Count($data) >0){
            $item=photo_gallery_image::wheregallery_id($data[0]->id)->get();
           //dd($item);
                if(Count($item)>0){
                return view('front.Layouts.inner-page.gallerys.photo-category',['item'=>$item,'data'=>$data]);
                    }else{
                    return abort(401);
                }
            }else{
                return abort(401);
            }
        }elseif(video_gallery::wherevideo_slug($slug)->get()->count())
        {
            $data=video_gallery::wherevideo_slug($slug)->get();
            if(Count($data)>0){
             $item=video_gallery_tittle::wheregallery_id($data[0]->id)->get();

            if(Count($item)>0){
            return view('front.Layouts.inner-page.gallerys.video-miltimage',['item'=>$item,'data'=>$data]);
            }else{
                return abort(401);
            }
            }else{
                return abort(401);
            }
        }else{

           if(club::whereslug($slug)->get()->count()){    //club single

                $item=club::whereslug($slug)->get();
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::whereClub($item[0]->id)->get();
                $data=club_multiple_image::whereparent_id($item[0]->id)->get();
                $cccbreadcram="Club";
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['cccbreadcram'=>$cccbreadcram,'chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }
            elseif(commmittee::whereslug($slug)->get()->count()){    //commitee single
                $item=commmittee::whereslug($slug)->get();
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::wherecommittee($item[0]->id)->get();
                $data=committee_multiple_image::whereparent_id($item[0]->id)->get();
                $cccbreadcram="Committee";
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['cccbreadcram'=>$cccbreadcram,'chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }
            elseif(cell::whereslug($slug)->get()->count()){    //cell single

                $item=cell::whereslug($slug)->get();
               // dd($item);
                if(count($item) >0){
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersons=OrganisationStructure::whereCell($item[0]->id)->get();
               // dd($chairpersons);
                $data=cell_multiple_image::whereparent_id($item[0]->id)->get();
                $cccbreadcram="Cell";
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee_details',['cccbreadcram'=>$cccbreadcram,'chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'item'=>$item,'data'=>$data]);
                }else{
                    return abort(401);
                }
            }
        }

    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//sub menu
    public function sub_barInnerpage($main_slug,$slug ,Request $request)  //content page sub menu
    {


    $sub_menu="sub menu";
    $type=SubMenu::whereslug($slug)->get();
   // dd($type);
    if(Count($type)>0)
    {
        if($type[0]->url == '/content-page')
        {
            if(Count($type)>0)
            {
                $type=SubMenu::whereslug($slug)->get('link_option');
                $item=content_page::whereid($type[0]->link_option)->get();
                if(count($item)>0){
                $type=SubMenu::whereslug($slug)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);
                }
                else
                {
                    return abort(401);
                }
            }
        }
        elseif($type[0]->url == '/who-is-who')
        {
            if(isset($type[0]) && $type[0]->tpl_id == 1)
            {

                //// return "Board of directer";
                   $data=SubMenu::whereslug($slug)->get();

                    $item=OrganisationStructure::get();


                    if(count($item)>0){

                    $type=SubMenu::whereslug($slug)->get();

                    return view('front.Layouts.child_pages.menu_bar.main_menu.department_info',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);

                    }else{
                        return abort(401);
                    }
            }
            elseif(isset($type[0]) && $type[0]->tpl_id == 11)
            {
              //dd($slug);
                $data=SubMenu::whereslug($slug)->get();
                if(Count($data)>0){
                $item=OrganisationStructure::get();
                if(count($item)>0){
                $type=SubMenu::whereslug($slug)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.placement_team',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);
                }else{
                    return abort(401);
                }
                }else{
                    return abort(401);
                }
            }
            elseif(isset($type[0]) && $type[0]->tpl_id == 5)
            {

                $data=SubMenu::whereslug($slug)->get();

                if(Count($data)>0){

                $item=OrganisationStructure::get();


                if(count($item)>0){

                $type=SubMenu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.internation_team',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);
                }else{
                    return abort(401);
                }
                }else{
                    return abort(401);
                }
            }
            elseif(isset($type[0]) && $type[0]->tpl_id == 3)
            {
                $item=OrganisationStructure::where('department',6)->paginate(9);

                if(count($item)>0){

                $type=SubMenu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.faculty',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);

                }else{
                    return abort(401);
                }

            }
            elseif(isset($type[0]) && $type[0]->tpl_id == 4)
            {

                $item=OrganisationStructure::where('department',7)->paginate(9);

                if(count($item)>0){

                $type=SubMenu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.visiting_faculity',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);

                }else{
                    return abort(401);
                }
            }
             elseif(isset($type[0]) && $type[0]->tpl_id == 2)
            {
                $data=SubMenu::whereslug($slug)->get();
                if(Count($data)>0){

                $item=OrganisationStructure::whereid($data[0]->link_option)->get();

                if(count($item)>0){

                $type=SubMenu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);
                }else{
                    return abort(401);
                }
                }else{
                    return abort(401);
                }
            }
            else{
                $data=SubMenu::whereslug($slug)->get();
                if(Count($data)>0){

                $item=OrganisationStructure::whereid($data[0]->link_option)->get();

                if(count($item)>0){

                $type=SubMenu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);
                }else{
                    return abort(401);
                }


                }else{
                    return abort(401);
                }
            }
        }
		elseif($type[0]->url == '/Club-Cells-Committee')
        {


                $data=SubMenu::whereslug($slug)->get();
                $data1=commmittee::wherestatus('1')->wheretype('1')->get();
                $data=club::wherestatus('1')->get();
                $data2=cell::wherestatus('1')->get();
                $type=SubMenu::whereslug($slug)->get();
                if(count($type)>0){
                    return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee',['sub_menu'=>$sub_menu,'type'=>$type,'data'=>$data,'data1'=>$data1,'data2'=>$data2]);

                }else{
                    return abort(401);
                }

        }



        elseif($type[0]->url == '/placement-committee')
        {

                    $item=commmittee::wherestatus('1')->wheretype('2')->get();
                    if(count($type)>0){
                    $data=SubMenu::whereslug($slug)->get();
                    $type=SubMenu::whereslug($slug)->get();
                    $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                    $chairpersone=OrganisationStructure::whereid($item[0]->placement)->get();
                    $chairpersons=OrganisationStructure::wherecommittee($item[0]->id)->get();
                    $data=committee_multiple_image::whereparent_id($item[0]->id)->get();
                    return view('front.Layouts.child_pages.menu_bar.main_menu.placement-committee',['chairpersone'=>$chairpersone,'data'=>$data,'chairperson'=>$chairperson,'chairpersons'=>$chairpersons,'sub_menu'=>$sub_menu,'type'=>$type,'data'=>$data,'item'=>$item]);

                }else{
                    return abort(401);
                }


        }

       /* elseif($type[0]->url == '/Club-Cells-Committee')
        {

        $data1=commmittee::wherestatus('1')->wheretype('2')->where('placement','!=',NULL)->first();

        if(isset($data1->id) == $type[0]->link_option)
        {

                $item=commmittee::wherestatus('1')->wheretype('2')->get();
                $data=SubMenu::whereslug($slug)->get();
                $type=SubMenu::whereslug($slug)->get();
                $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
                $chairpersone=OrganisationStructure::whereid($item[0]->placement)->get();
                $chairpersons=OrganisationStructure::wherecommittee($item[0]->id)->get();
                $data=committee_multiple_image::whereparent_id($item[0]->id)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.placement-committee',['chairpersone'=>$chairpersone,'data'=>$data,'chairperson'=>$chairperson,'chairpersons'=>$chairpersons,'sub_menu'=>$sub_menu,'type'=>$type,'data'=>$data,'item'=>$item]);

        }else{

            $data=SubMenu::whereslug($slug)->get();
            $data1=commmittee::wherestatus('1')->get();
            $data=club::wherestatus('1')->get();
            $data2=cell::wherestatus('1')->get();
            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){
                return view('front.Layouts.child_pages.menu_bar.main_menu.clube_committee',['sub_menu'=>$sub_menu,'type'=>$type,'data'=>$data,'data1'=>$data1,'data2'=>$data2]);

            }else{
                return abort(401);
            }

        }

        }*/
        elseif($type[0]->url == '/Wellness-Facilities')
        {
            $type=SubMenu::whereslug($slug)->get();
            $value=wellness_facilitie::get();
            $chairpersons=OrganisationStructure::where('wellness_cootdiantors','=','1')->get();
            $item=wellness_facilitie_image::whereparent_id($value[0]->id)->get();
            if(count($type)>0){
             return view('front.Layouts.child_pages.menu_bar.main_menu.wellness_facilitie',['value'=>$value,'item'=>$item,'chairpersons'=>$chairpersons,'sub_menu'=>$sub_menu,'type'=>$type]);

            }else{
                return abort(401);
            }

        }


         elseif($type[0]->url == '/journal-publications')
        {
            $data=SubMenu::whereslug($slug)->get();
            if(Count($data)>0){
            if($request->year){
                $item=journal_publication::wherestatus('1')->whereYear('year',$request->year)->paginate(10);
            }else{
                $item=journal_publication::wherestatus('1')->paginate(10);
            }
            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){
           return view('front.Layouts.child_pages.menu_bar.main_menu.journal_publications',['item'=>$item,'sub_menu'=>$sub_menu,'type'=>$type,'data'=>$data]);

            }else{
                return abort(401);
            }
            }else{
                return abort(401);
            }
        }
        // elseif($type[0]->url == '/Organisation-Journey')
        // {


        //     $data=SubMenu::whereslug($slug)->get();
        //     $item=press_media::get();
        //     if(Count($item)>0){
        //     $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
        //     $chairpersons=OrganisationStructure::where('MEDIA_COORDINATORS','=','1')->get();
        //     $type=SubMenu::whereslug($slug)->get();
        //     if(count($type)>0){
        //     return view('front.Layouts.child_pages.menu_bar.main_menu.story',['item'=>$item,'item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu,'chairperson'=>$chairperson,'chairpersons'=>$chairpersons]);

        //     }else{
        //         return abort(401);
        //     }
        //     }else{
        //         return abort(401);
        //     }
        // }
      elseif($type[0]->url == '/student-council')
        {

            $data=SubMenu::whereslug($slug)->get();
            if(Count($data)>0){
            $item=student_council::wherestatus('1')->get();
            //dd($item);
            $chairperson=OrganisationStructure::whereid($item[0]->chairperson)->get();
            $chairpersons=StudentProfile::where('student_council','=','1')->get();
           // dd($chairpersons);
            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){

           return view('front.Layouts.child_pages.menu_bar.main_menu.student_council',['item'=>$item,'chairpersons'=>$chairpersons,'chairperson'=>$chairperson,'sub_menu'=>$sub_menu,'type'=>$type,'data'=>$data]);

            }else{
                return abort(401);
            }
            }else{
                return abort(401);
            }
        }

        elseif($type[0]->url == '/Events-Activites')
        {


            $item=SubMenu::whereslug($slug)->get();
            if(Count($item)>0){
               // dd('dd');
            $data=Events::wherestatus('1')->get();

            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){

            //dd($type);

           return view('front.Layouts.child_pages.menu_bar.main_menu.event&activity',['item'=>$item,'sub_menu'=>$sub_menu,'type'=>$type,'data'=>$data]);

            }else{
                return abort(401);
            }
            }else{
                return abort(401);
            }
        }
        elseif($type[0]->url == '/Organisation-Journey')
        {

            $data=SubMenu::whereslug($slug)->get();
            if(Count($data)>0){
            $item=org_journies::get();
            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){
            return view('front.Layouts.child_pages.menu_bar.main_menu.story',['item'=>$item,'item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);

            }else{
                return abort(401);
            }
            }else{
                return abort(401);
            }
        }

        elseif($type[0]->url == '/photo-gallery')
        {

               $item=photo_gallery::whereid($type[0]->link_option)->get();
                if(Count($item)>0){
                  //  dd($item);
                $value=photo_gallery_image::wheregallery_id($item[0]->id)->get();
                $type=SubMenu::whereslug($slug)->get();
                   return view('front.Layouts.child_pages.menu_bar.main_menu.master',['value'=>$value,'type'=>$type,'item'=>$item,'sub_menu'=>$sub_menu]);
                }
        }elseif($type[0]->url == '/video-gallery')
        {
                $item=video_gallery::whereid($type[0]->link_option)->get();
                //dd($item);
                if(Count($item)>0){
                $values=video_gallery_tittle::wheregallery_id($item[0]->id)->get();
                  //dd($values);
                $type_sub=child_menu::whereslug($slug)->get();
                $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                $type_child=child_menu::whereslug($slug)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.master',['values'=>$values,'item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
                }
        }
    }
    else
    {
        return abort(401);
    }


  }


    // public function subinnerpage($main_slug,$slug) //who is who page sub menu
    // {

    //    // return $slug;

    //    $type=SubMenu::whereslug($slug)->get();

    //     if(isset($type[0]) && $type[0]->tpl_id == 1){

    //        // return "governer";

    //            $item=OrganisationStructure::get();

    //            if(count($item)>0){

    //            $type=SubMenu::whereslug($slug)->get();

    //             return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.department_info',['item'=>$item,'type'=>$type]);

    //             }else{
    //                 return abort(401);
    //             }



    //     }elseif(isset($type[0]) && $type[0]->tpl_id == 3){


    //         $item=OrganisationStructure::where('department',6)->paginate(9);

    //         if(count($item)>0){

    //         $type=SubMenu::whereslug($slug)->get();

    //         return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.faculty',['item'=>$item,'type'=>$type]);

    //         }else{
    //             return abort(401);
    //         }

    //     }elseif(isset($type[0]) && $type[0]->tpl_id == 4){



    //         $item=OrganisationStructure::where('department',7)->paginate(9);

    //         //dd($item);

    //         if(count($item)>0){

    //         $type=SubMenu::whereslug($slug)->get();

    //         return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.visiting_faculity',['item'=>$item,'type'=>$type]);

    //         }else{
    //             return abort(401);
    //         }
    //     }else{


    //         $data=SubMenu::whereslug($slug)->get();
    //      if(Count($data)>0){
    //         $item=OrganisationStructure::whereid($data[0]->link_option)->get();

    //         if(count($item)>0){

    //         $type=SubMenu::whereslug($slug)->get();

    //        return view('front.Layouts.child_pages.menu_bar.sub_menu_pages.member',['item'=>$item,'type'=>$type]);
    //         }else{
    //             return abort(401);
    //         }

    //     }else{
    //         return abort(401);
    //     }

    //     }


    // }




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Child menu controller

public function Child_barInnerpage($main_slug,$Sub_slug,$slug) //content page
{



    $data=child_menu::whereslug($slug)->get();

    if(Count($data)>0){

        if($slug=="student-profiles")
        {
            $item = StudentProfile::orderBy('sort')->get();
            if(Count($item)>0){
            $type_sub=child_menu::whereslug($slug)->get();
            $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
            $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
            $type_child=child_menu::whereslug($slug)->get();
            return view('front.Layouts.child_pages.student-profile.student-profile-front',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
            }else{
            return abort(401);
            }
        }


        if($data[0]->url == '/content-page')
        {


            $item=content_page::whereid($data[0]->link_option)->get();

            if($slug == 'communications'){
                $membersList=OrganisationStructure::where('faculty_id',2)->get();

            }elseif($slug == 'economics')
            {
                $membersList=OrganisationStructure::where('faculty_id',3)->get();

            }elseif($slug == 'finance-and-accounting')
            {
                $membersList=OrganisationStructure::where('faculty_id',4)->get();
            }
            elseif($slug == 'information-technology-systems')
            {
                $membersList=OrganisationStructure::where('faculty_id',6)->get();
            }

            elseif($slug == 'marketing')
            {
                $membersList=OrganisationStructure::where('faculty_id',7)->get();
            }
            elseif($slug == 'operations-management-decision-sciences')
            {
                $membersList=OrganisationStructure::where('faculty_id',8)->get();
            }
            elseif($slug == 'organisational-behaviour-human-resource-management')
            {
                $membersList=OrganisationStructure::where('faculty_id',12)->get();
            }else{

                if(Count($item)>0){
                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();
                    return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);

                }

            }

            if(Count($item)>0){
            $type_sub=child_menu::whereslug($slug)->get();
            $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
            $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
            $type_child=child_menu::whereslug($slug)->get();
            return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get,'membersList'=>$membersList]);
            }else{
            return abort(401);
            }
        }elseif($data[0]->url == '/who-is-who')
        {
            if(isset($data[0]) && $data[0]->tpl_id == 1) //default degian
            {

                    //return "Board of directer";
                    $item=OrganisationStructure::get();
                    if(count($item)>0){
                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();
                    return view('front.Layouts.child_pages.menu_bar.main_menu.department_info',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);

                    }else{
                        return abort(401);
                    }
            }
            elseif(isset($data[0]) && $data[0]->tpl_id == 2)     //directer profile
            {
                //return 'member';

                $item=OrganisationStructure::whereid($data[0]->link_option)->get();
                // dd($item);
                if(count($item)>0){

                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
                }else{
                    return abort(401);
                }

            }
            elseif(isset($data[0]) && $data[0]->tpl_id == 5)     //the team
            {
               // return 'member';

                $item=OrganisationStructure::get();

                if(count($item)>0){

                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.internation_team',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
                }else{
                    return abort(401);
                }

            }
            elseif(isset($data[0]) && $data[0]->tpl_id == 3){     // factulty directry

                $item=OrganisationStructure::where('department',6)->paginate(9);

                if(count($item)>0){

                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.faculty',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);

                }else{
                    return abort(401);
                }
            }

            elseif(isset($data[0]) && $data[0]->tpl_id == 7){     // testionials

                $item=OrganisationStructure::where('department',10)->paginate(9);

               // dd($item);

                if(count($item)>0){

                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.testionials',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);

                }else{
                    return abort(401);
                }

            }

            elseif(isset($data[0]) && $data[0]->tpl_id == 4){    //visiting faculty


                $item=OrganisationStructure::where('department',7)->paginate(9);
                if(count($item)>0){

                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.visiting_faculity',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);

                }else{
                    $item=OrganisationStructure::whereid($data[0]->link_option)->get();
                    // dd($item);
                    if(count($item)>0){

                        $type_sub=child_menu::whereslug($slug)->get();
                        $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                        $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                        $type_child=child_menu::whereslug($slug)->get();

                    return view('front.Layouts.child_pages.menu_bar.main_menu.member',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
                    }else{
                        return abort(401);
                    }
                }
            }



            else{


                return abort(401);

            }
        }elseif($data[0]->url == '/photo-gallery')
        {
               $item=photo_gallery::whereid($data[0]->link_option)->get();
                if(Count($item)>0){
                $value=photo_gallery_image::wheregallery_id($item[0]->id)->get();
                //dd($value);
                $type_sub=child_menu::whereslug($slug)->get();
                $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                $type_child=child_menu::whereslug($slug)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.master',['value'=>$value,'item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
                }
        }elseif($data[0]->url == '/video-gallery')
        {
                $item=video_gallery::whereid($data[0]->link_option)->get();
                //dd($item);
                if(Count($item)>0){
                $values=video_gallery_tittle::wheregallery_id($item[0]->id)->get();
                  //dd($values);
                $type_sub=child_menu::whereslug($slug)->get();
                $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                $type_child=child_menu::whereslug($slug)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.master',['values'=>$values,'item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
                }

        }else{
            return abort(401);
        }

    }else{


        $item=OrganisationStructure::whereslug($slug)->get();
        if(count($item) > 0){
        $data=multiple_profile::whereparent_id($item[0]->id)->get();

            $type_sub=$item;
            $gets=SubMenu::whereslug($Sub_slug)->get();
            $get=MainMenu::whereslug($main_slug)->get();
            return view('front.Layouts.profile',['item'=>$item,'data'=>$data,'type_sub'=>$type_sub,'gets'=>$gets,'get'=>$get]);
        }else{
            return abort(401);
        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////   Video section

    public function video_multi_Innerpage()
    {
       $item=video_gallery::wheretype(0)->wherestatus('1')->get();
       if(Count($item)>0){
           return view('front.Layouts.inner-page.gallerys.video-category',['item'=>$item]);
       }else{
           return abort(401);
       }

    }


    public function photo_multi_Innerpage()
    {
       $item=photo_gallery::wheretype(0)->wherestatus('1')->get();
       if(Count($item)>0){
              return view('front.Layouts.inner-page.gallerys.photo-miltpage_category',['item'=>$item]);
       }else{
           return abort(401);
       }

    }


















    //who is who incomplete


        // public function Childinnerpage($main_slug,$Sub_slug,$slug) //who is who page
        // {

        // if($slug == 'board-of-governors'){

        //    // return "governer";

        //       $item=OrganisationStructure::get('link_option');

        //       $type=child_menu::whereslug($slug)->get('sub_id');

        //       $menu=child_menu::wheresub_id($type[0]->sub_id)->get('name');


        //      return view('front.Layouts.child_pages.menu_bar.child_menu_page.department_info',['item'=>$item,'menu'=>$menu]);

        //   }else{


        //    // return "directer";

        //       $data=child_menu::whereslug($slug)->get('link_option');
        //       if(Count($data)>0){
        //       $item=OrganisationStructure::whereid($data[0]->link_option)->get();

        //       $type_sub=child_menu::whereslug($slug)->get('menu_id');

        //       $type_child=child_menu::whereslug($slug)->get('sub_id');

        //       return view('front.Layouts.child_pages.menu_bar.child_menu_page.member',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child]);
        //     }else{
        //         return abort(401);
        //     }



        //     }

        // }


//home dashboard in our website


    // public function  Academics_Innerpage($slug)
    // {



    //     $data=QuickLink::whereslug($slug)->get();
    //     if(Count($data)>0){
    //         $item=content_page::whereid($data[0]->link_option)->get();
    //         if(Count($item)>0){
    //         //dd($item);
    //         return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);


    //         }else{
    //             return abort(401);
    //         }





    //     }else{
    //         return abort(401);
    //                         }
    // }


    // public function  Category_Innerpage($slug)
    // {
    //    // return $slug;

    //     $data=QuickLink::whereslug($slug)->get('link_option');
    //     //dd($data);
    // if(Count($data)>0){
    //     $item=content_page::whereid($data[0]->link_option)->get();

    //     if(Count($item)>0){

    //      return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);

    //     }else{
    //         return abort(401);
    //     }

    // }else{
    //     return abort(401);
    // }



    // }




    // public function  Footer_info_Innerpage($slug)
    // {
    //     //return $slug;
    //     $data=QuickLink::whereslug($slug)->get('link_option');
    //     //dd($data);
    // if(Count($data)>0){

    //     $item=content_page::whereid($data[0]->link_option)->get();

    //     if(Count($item)>0){
    //     //dd($item);
    //     return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);


    //     }else{
    //         return abort(401);
    //     }


    // }else{
    //     return abort(401);
    // }

    // }




    // public function  Footer_info2_Innerpage($slug)
    // {
    //     //return $slug;
    //     $data=QuickLink::whereslug($slug)->get('link_option');
    //     //dd($data);
    //  if(Count($data)>0){
    //     $item=content_page::whereid($data[0]->link_option)->get();
    //     //dd($item);
    //     if(Count($item)>0){

    //     return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);

    //     }else{
    //         return abort(401);
    //     }

    // }else{
    //     return abort(401);
    // }

    // }


//student inner page

    // public function stundent_Innerpage($slug)
    // {
    //       //return $slug;
    //       $data=QuickLink::whereslug($slug)->get('link_option');
    //       //dd($data);
    //       if(Count($data)>0){
    //        $item=content_page::whereid($data[0]->link_option)->get();
    //        //dd($item);
    //        if(Count($item)>0){
    //      return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
    //         }else{
    //             return abort(401);
    //         }


    //     }else{
    //         return abort(401);
    //     }
    // }







//url inner page


    // public function urls_Innerpage($slug)
    // {
    //       //return $slug;
    //       $data=QuickLink::whereslug($slug)->get('link_option');
    //       //dd($data);
    //       if(Count($data)>0){
    //        $item=content_page::whereid($data[0]->link_option)->get();
    //        //dd($item);
    //        if(Count($item)>0){
    //      return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item]);
    //     }else{
    //         return abort(401);
    //     }


    // }else{
    //     return abort(401);
    // }
    // }





// //photo & video inner page
// public function  video_multi_Innerpage($video_slug)
// {
//       //return $video_slug;
//       $data=video_gallery::wherevideo_slug($video_slug)->get("id");
//       //dd($data);
//       if(Count($data)>0){
//        $item=video_gallery_tittle::wheregallery_id($data[0]->id)->get();
//        //dd($item);
//        if(Count($item)>0){

//     return view('front.Layouts.inner-page.gallerys.video-miltimage',['item'=>$item]);

//     }else{
//         return abort(401);
//     }

// }else{
//     return abort(401);
// }

// }

// public function  photo_multi_Innerpage($photo_slug)
// {
//             //return $photo_slug;
//         $data=photo_gallery::wherephoto_slug($photo_slug)->get("id");
//             // dd($data);
//             if(Count($data)>0){
//         $item=photo_gallery_image::wheregallery_id($data[0]->id)->get();
//         //dd($item);
//         if(Count($item)>0){
//         return view('front.Layouts.inner-page.gallerys.photo-category',['item'=>$item]);
//     }else{
//         return abort(401);
//     }

// }else{
//     return abort(401);
// }
// }






    public function  photo_Innerpage($slug)
    {
         //return $slug;
         $data=QuickLink::whereslug($slug)->get();

         //dd($data);
         if(Count($data)>0){
        $item=photo_gallery::whereid($data[0]->link_option)->get();
            //dd($item);
        if(Count($item)>0){
        return view('front.Layouts.inner-page.gallerys.photo-miltpage_category',['item'=>$item]);
        }else{
            return abort(401);
        }

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

        if(Count($item)>0){
        return view('front.Layouts.inner-page.gallerys.video-category',['item'=>$item]);
        }else{
            return abort(401);
        }

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




}
