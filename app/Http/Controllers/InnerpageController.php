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
use App\Models\dissertation;
use App\Models\OrganisationStructure;
use App\Models\multiple_profile;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Trunc;
use PHPUnit\Framework\Constraint\Count;
use App\Models\club;
use App\Models\cell;
use App\Models\commmittee;
use App\Models\Department;
use App\Models\org_journies;
use App\Models\club_multiple_image;
use App\Models\committee_multiple_image;
use App\Models\cell_multiple_image;
use App\Models\press_media;
use App\Models\news_event;
use App\Models\scstobc_forms;
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
use App\Models\BannerSlider;
use App\Models\Org;
use App\Models\project_logo;
use App\Models\quick_linkcategory;
use App\Models\search;
use App\Models\report;
use App\Models\researchSeminars;
class InnerpageController extends Controller
{

// public function master_page()
// {
//   return view('front.Layouts.child_pages.menu_bar.main_menu.master');
// }
//
//
//

public function archive($slug){

   if($slug == 'career' || $slug == 'Career'){
     $bread="Career";
     $data =Career::get();
     return view('front.Layouts.child_pages.menu_bar.main_menu.archive',['data'=>$data,'bread'=>$bread]);
    }
    elseif($slug == 'tenders' || $slug ==  'Tender' || $slug ==  'tender' ||$slug ==  'Tenders'){
    $bread="Tender";
    $data =Tender::get();
    return view('front.Layouts.child_pages.menu_bar.main_menu.archive',['data'=>$data,'bread'=>$bread]);
    }
    elseif($slug == 'Vendors-Debarred' || $slug ==  'vendors-debarred'){
    $bread="Vendors-Debarred";
    $data =Vendorsdebarred::get();
    return view('front.Layouts.child_pages.menu_bar.main_menu.archive',['data'=>$data,'bread'=>$bread]);
    }
    elseif($slug == 'rti'||$slug == 'RTI'||$slug == 'rtis'||$slug == 'RTIS'){
     $bread="Rti";
     $item=rti::wherestatus('1')->get();
     $data=rit_report_section::get();
     $value=quarter_report::get();
    return view('front.Layouts.child_pages.menu_bar.main_menu.archive-rti',['data'=>$data,'item'=>$item,'item'=>$item,'value'=>$value,'bread'=>$bread]);
    }
    elseif($slug == 'industry-connect' || 'Industry-Connect' || 'industry-connects'){
    $bread="industry-connect";
    $data =Industry::get();
    return view('front.Layouts.child_pages.menu_bar.main_menu.archive',['data'=>$data,'bread'=>$bread]);
    }
   else{

   }

}


public function search(Request $request){

    $search=$request->search;
    $anti_raggings=anti_raggings::where("title","like","%$search%")->get();
    $BannerSlider=  BannerSlider::where("title","like","%$search%")->orwhere("type","like","%$search%")->orwhere("short","like","%$search%")->orwhere("heading1","like","%$search%")->get();
    $Career= Career::where("name_of_the_post","like","%$search%")->orwhere("detail_advertisement","like","%$search%") ->orwhere("corrigendum","like","%$search%")->orwhere("note","like","%$search%")->get();

    $cell_multiple_image=cell_multiple_image::where("event","like","%$search%")->get();
    $cell=cell::where("title","like","%$search%") ->orwhere("about_details","like","%$search%")->orwhere("activites","like","%$search%")->orwhere("event","like","%$search%")->get();
    $club=club::where("title","like","%$search%")->orwhere("about_details","like","%$search%")->orwhere("event","like","%$search%")->get();
    $commmittee= commmittee::where("title","like","%$search%")->orwhere("about_details","like","%$search%")->orwhere("activites","like","%$search%")->orwhere("event","like","%$search%")->get();
    $committee_multiple_image=committee_multiple_image::where("committee_title","like","%$search%")->orwhere("event","like","%$search%")->get();
    $content_page=content_page::where("name","like","%$search%")->orwhere("content","like","%$search%")->get() ;
    $Events= Events::where("title","like","%$search%")->get();
    $Industry=Industry::where("title","like","%$search%")->get();
    $journal_publication=journal_publication::where("title","like","%$search%")->get();
    $journal_publication_child=journal_publication_child::where("about_details","like","%$search%")->get();
    $multiple_profile= multiple_profile::where("Title","like","%$search%")->orwhere("heading","like","%$search%")->orwhere("description","like","%$search%")->get();
    $OrganisationStructure=OrganisationStructure::where("title","like","%$search%") ->orwhere("email","like","%$search%")->orwhere("designation","like","%$search%")->orwhere("phone","like","%$search%") ->orwhere("description","like","%$search%")->get();
    $news_event= news_event::where("title","like","%$search%")->get();
    $org=Org::where("name","like","%$search%")
                 ->orwhere("contact","like","%$search%")
                 ->orwhere("email","like","%$search%")
                 ->orwhere("about","like","%$search%")
                 ->orwhere("address","like","%$search%")
                  ->get();
    $org_journies=org_journies::where("title","like","%$search%")
        ->orwhere("heading","like","%$search%")
        ->get();
      $press_media= press_media::where("heading","like","%$search%")
                 ->orwhere("media_publication","like","%$search%")
                 ->orwhere("title","like","%$search%")
                 ->orwhere("address","like","%$search%")
                ->orwhere("email","like","%$search%")
                ->get();

    $project_logo = project_logo::where("name","like","%$search%")
            ->orwhere("number","like","%$search%")
             ->get();
    $quick_linkcategory=quick_linkcategory::where("Section","like","%$search%")
                    ->orwhere("short_note","like","%$search%")
                ->get();
    $QuickLink=QuickLink::where("title","like","%$search%")
        ->orwhere("short","like","%$search%")
        ->get();
    $rit=rti::where("title","like","%$search%")->orwhere("CPIO","like","%$search%")->orwhere("Authority","like","%$search%")->get();
    $student_council=student_council::where("about_details","like","%$search%")->orwhere("student_council","like","%$search%")->get();

    $StudentProfile = StudentProfile::where("name","like","%$search%")
                ->orwhere("area_specialization","like","%$search%")
                ->orwhere("email","like","%$search%")
                ->orwhere("about","like","%$search%")
                ->orwhere("educational_background","like","%$search%")
                ->orwhere("work_experience","like","%$search%")
                ->orwhere("research_interests","like","%$search%")
                ->orwhere("contact","like","%$search%")
                ->orwhere("papers_publications","like","%$search%")
                ->orwhere("last_name","like","%$search%")
                ->get();
    $tender= tender::where("title","like","%$search%")
               ->orwhere("corrigendum","like","%$search%")
               ->get();
    $Vendorsdebarred= Vendorsdebarred::where("vendor_name","like","%$search%")
                          ->get();
    $video_gallery=video_gallery::where("name","like","%$search%")
                    ->orwhere("content","like","%$search%")
                    ->get();
    $video_gallery_tittles=	video_gallery_tittle::where("video_url","like","%$search%")
       ->orwhere("video_title","like","%$search%")
       ->orwhere("slug","like","%$search%")
          ->get();

     $wellness_facilitie=  wellness_facilitie::where("about_details","like","%$search%")
                           ->orwhere("description","like","%$search%")
                           ->orwhere("EVENTS","like","%$search%")
                           ->orwhere("title","like","%$search%")
                           ->orwhere("description","like","%$search%")
                           ->get();


    $wellness_facilitie_image= wellness_facilitie_image::where("image_title","like","%$search%")
                ->orwhere("event","like","%$search%")
                ->orwhere("DESCRIPTION","like","%$search%")
                ->get();




    return view('front.Layouts.search_details',compact('video_gallery_tittles','wellness_facilitie_image','anti_raggings','BannerSlider','Career','cell_multiple_image','cell','club','commmittee','committee_multiple_image','content_page','Events','Industry','journal_publication_child','multiple_profile','OrganisationStructure','news_event','org','org_journies','press_media','project_logo','wellness_facilitie','video_gallery','Vendorsdebarred','tender','StudentProfile','student_council','rit','QuickLink','quick_linkcategory'));

}











// public function search(Request $request){


//     $search=$request->search;
//     if(anti_raggings::where("title","like","%$search%")->get(){
//           $anti_raggings=anti_raggings::where("title","like","%$search%")->get();
//     }elseif(BannerSlider::where("title","like","%$search%")->orwhere("short","like","%$search%")->orwhere("heading1","like","%$search%")->get()->count()){

//         $BannerSlider=BannerSlider::where("title","like","%$search%")->orwhere("short","like","%$search%")->orwhere("heading1","like","%$search%")->get();

//     }elseif(Career::where("name_of_the_post","like","%$search%")->orwhere("detail_advertisement","like","%$search%") ->orwhere("corrigendum","like","%$search%")->orwhere("note","like","%$search%")->get()->count()){

//          $Career=Career::where("name_of_the_post","like","%$search%")->orwhere("detail_advertisement","like","%$search%") ->orwhere("corrigendum","like","%$search%")->orwhere("note","like","%$search%")->get();

//     }elseif(cell_multiple_image::where("event","like","%$search%")->get()->count()){

//         $cell_multiple_image=cell_multiple_image::where("event","like","%$search%")->get();

//     }elseif(cell::where("title","like","%$search%") ->orwhere("about_details","like","%$search%")->orwhere("activites","like","%$search%")->orwhere("event","like","%$search%")->get()->count()){


//          $cell=cell::where("title","like","%$search%") ->orwhere("about_details","like","%$search%")->orwhere("activites","like","%$search%")->orwhere("event","like","%$search%")->get();

//        dd($cell);

//     }elseif(club::where("title","like","%$search%")->orwhere("about_details","like","%$search%")->orwhere("event","like","%$search%")->get()->count()){

//        $club=club::where("title","like","%$search%")->orwhere("about_details","like","%$search%")->orwhere("event","like","%$search%")->get();

//      dd($club);

//     }elseif(commmittee::where("title","like","%$search%")->orwhere("about_details","like","%$search%")->orwhere("activites","like","%$search%")->orwhere("event","like","%$search%")->get()->count()){


//         $commmittee= commmittee::where("title","like","%$search%")->orwhere("about_details","like","%$search%")->orwhere("activites","like","%$search%")->orwhere("event","like","%$search%")->get();

//        dd($committee);

//     }elseif(committee_multiple_image::where("committee_title","like","%$search%")->orwhere("event","like","%$search%")->get()->count()){

//         $committee_multiple_image=committee_multiple_image::where("committee_title","like","%$search%")->orwhere("event","like","%$search%")->get();

//     }elseif(content_page::where("name","like","%$search%")->orwhere("content","like","%$search%")->get()->count()){

//         $content_page= content_page::where("name","like","%$search%")->orwhere("content","like","%$search%")->get();

//         dd($content_page);

//     }elseif(Events::where("title","like","%$search%")->get()->count()){

//         $Events=Events::where("title","like","%$search%")->get();

//     }elseif(Industry::where("title","like","%$search%")->get()->count()){

//        $Industry =Industry::where("title","like","%$search%")->get();

//     }elseif(journal_publication::where("title","like","%$search%")->get()->count())
//     {


//          $journal_publication= journal_publication::where("title","like","%$search%")->get();
//     }elseif(journal_publication_child::where("about_details","like","%$search%")->get()->count()){

//           $journal_publication_child=journal_publication_child::where("about_details","like","%$search%")->get();

//     }elseif(multiple_profile::where("Title","like","%$search%")->orwhere("heading","like","%$search%")->orwhere("description","like","%$search%")->get()->count())
//     {

//           $multiple_profile= multiple_profile::where("Title","like","%$search%")->orwhere("heading","like","%$search%")->orwhere("description","like","%$search%")->get();

//     }elseif(OrganisationStructure::where("title","like","%$search%") ->orwhere("email","like","%$search%")->orwhere("designation","like","%$search%")->orwhere("phone","like","%$search%") ->orwhere("description","like","%$search%")->get()->count()){

//         $OrganisationStructure=OrganisationStructure::where("title","like","%$search%") ->orwhere("email","like","%$search%")->orwhere("designation","like","%$search%")->orwhere("phone","like","%$search%") ->orwhere("description","like","%$search%")->get();

//     }elseif(news_event::where("title","like","%$search%")->get()->count()){

//           $news_event=news_event::where("title","like","%$search%")->get();

//     }elseif(org::where("name","like","%$search%")
//                  ->orwhere("contact","like","%$search%")
//                  ->orwhere("email","like","%$search%")
//                  ->orwhere("about","like","%$search%")
//                  ->orwhere("address","like","%$search%")
//                   ->get()->count()){

//           $org= org::where("name","like","%$search%")
//                         ->orwhere("contact","like","%$search%")
//                         ->orwhere("email","like","%$search%")
//                         ->orwhere("about","like","%$search%")
//                         ->orwhere("address","like","%$search%")
//                         ->get();



//     }elseif(org_journies::where("title","like","%$search%")
//                      ->orwhere("heading","like","%$search%")
//                      ->get()->count()){


//                     $org_journies=org_journies::where("title","like","%$search%")
//                         ->orwhere("heading","like","%$search%")
//                         ->get();



//     }elseif(press_media::where("heading","like","%$search%")
//                  ->orwhere("media_publication","like","%$search%")
//                  ->orwhere("title","like","%$search%")
//                  ->orwhere("address","like","%$search%")
//                 ->orwhere("email","like","%$search%")
//                 ->get()->count()){

//             $press_media=press_media::where("heading","like","%$search%")
//                 ->orwhere("media_publication","like","%$search%")
//                 ->orwhere("title","like","%$search%")
//                 ->orwhere("address","like","%$search%")
//                 ->orwhere("email","like","%$search%")
//                 ->get();

//     }elseif(project_logo::where("name","like","%$search%")
//                       ->orwhere("number","like","%$search%")
//                       ->get()->count()){

//            $project_logo = project_logo::where("name","like","%$search%")
//             ->orwhere("number","like","%$search%")
//             ->get();


//     }elseif(project_logo::where("name","like","%$search%")
//                  ->orwhere("number","like","%$search%")
//                  ->get()->count()){

//               $project_logo=project_logo::where("name","like","%$search%")
//                     ->orwhere("number","like","%$search%")
//                     ->get();


//     }elseif(quick_linkcategory::where("Section","like","%$search%")
//                    ->orwhere("short_note","like","%$search%")
//                    ->get()->count()){


//               $quick_linkcategory= quick_linkcategory::where("Section","like","%$search%")
//                              ->orwhere("short_note","like","%$search%")
//                             ->get();


//     }elseif(QuickLink::where("title","like","%$search%")
//                        ->orwhere("short","like","%$search%")
//                        ->get()->count()){

//                  $QuickLink=QuickLink::where("title","like","%$search%")
//                         ->orwhere("short","like","%$search%")
//                         ->get();


//     }elseif(rti::where("title","like","%$search%")->orwhere("CPIO","like","%$search%")->orwhere("Authority","like","%$search%")->get()->count()){


//          $rit=rti::where("title","like","%$search%")->orwhere("CPIO","like","%$search%")->orwhere("Authority","like","%$search%")->get();

//     }elseif(student_council::where("about_details","like","%$search%")->orwhere("student_council","like","%$search%")->get()->count()){

//           $student_council=student_council::where("about_details","like","%$search%")->orwhere("student_council","like","%$search%")->get();


//     }elseif(StudentProfile::where("name","like","%$search%")
//                         ->orwhere("area_specialization","like","%$search%")
//                         ->orwhere("email","like","%$search%")
//                         ->orwhere("about","like","%$search%")
//                         ->orwhere("educational_background","like","%$search%")
//                         ->orwhere("work_experience","like","%$search%")
//                         ->orwhere("research_interests","like","%$search%")
//                         ->orwhere("contact","like","%$search%")
//                         ->orwhere("papers_publications","like","%$search%")
//                         ->orwhere("last_name","like","%$search%")
//                         ->get()->count()){


//               $StudentProfile = StudentProfile::where("name","like","%$search%")
//                             ->orwhere("area_specialization","like","%$search%")
//                             ->orwhere("email","like","%$search%")
//                             ->orwhere("about","like","%$search%")
//                             ->orwhere("educational_background","like","%$search%")
//                             ->orwhere("work_experience","like","%$search%")
//                             ->orwhere("research_interests","like","%$search%")
//                             ->orwhere("contact","like","%$search%")
//                             ->orwhere("papers_publications","like","%$search%")
//                             ->orwhere("last_name","like","%$search%")
//                             ->get();



//     }elseif(tender::where("title","like","%$search%")
//     ->orwhere("corrigendum","like","%$search%")
//     ->get()->count()){

//       $tender= tender::where("title","like","%$search%")
//                ->orwhere("corrigendum","like","%$search%")
//                ->get();


//     }elseif(Vendorsdebarred::where("vendor_name","like","%$search%")
//     ->get()){

//         $Vendorsdebarred= Vendorsdebarred::where("vendor_name","like","%$search%")
//                           ->get();

//     }elseif(video_gallery::where("name","like","%$search%")
//     ->orwhere("content","like","%$search%")
//       ->get()->count()){

//               $video_gallery=video_gallery::where("name","like","%$search%")
//                              ->orwhere("content","like","%$search%")
//                               ->get();



//     }elseif(wellness_facilitie::where("about_details","like","%$search%")
//     ->orwhere("description","like","%$search%")
//     ->orwhere("EVENTS","like","%$search%")
//     ->orwhere("title","like","%$search%")
//     ->orwhere("description","like","%$search%")
//     ->get()->count()){

//        $wellness_facilitie=  wellness_facilitie::where("about_details","like","%$search%")
//                            ->orwhere("description","like","%$search%")
//                            ->orwhere("EVENTS","like","%$search%")
//                            ->orwhere("title","like","%$search%")
//                            ->orwhere("description","like","%$search%")
//                            ->get();
//     }else{
//         return "record not found";
//     }

//  }

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
        $item=Industry::orderBy('id','Asc')->wherestatus(1)->get();
        return view('front.Layouts.child_pages.menu_bar.main_menu.Industry_connect',['item'=>$item]);
    }

//evnet& activity
    public function event_activity_image($id)
    {
        $data=event_image::whereparent_id(dDecrypt($id))->wherestatus(1)->get();
        $item=Events::whereid(dDecrypt($id))->get();
        return view('front.Layouts.child_pages.menu_bar.main_menu.event&activity_image',['data'=>$data,'item'=>$item]);
    }
// Tenders
public function Tenders(){   //->paginate(10)

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

    //dd($subchildmenu);
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
    }elseif(club::whereslug($superchild)->get()->count()){    //club single

         $item=club::whereslug($superchild)->get();
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
     elseif(commmittee::whereslug($superchild)->get()->count()){    //commitee single
         $item=commmittee::whereslug($superchild)->get();
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
     elseif(cell::whereslug($superchild)->get()->count()){    //cell single

         $item=cell::whereslug($superchild)->get();
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
     }elseif(OrganisationStructure::whereslug($superchild)->get()->count()){
        $item=OrganisationStructure::whereslug($superchild)->get();
        if(count($item) > 0){
        $data=multiple_profile::whereparent_id($item[0]->id)->get();
            return view('front.Layouts.profile',['item'=>$item,'data'=>$data]);
        }else{
            return abort(401);
        }
     }else{
        return abort(401);
     }

}

//news media
public function news_media()
{
    $item=news_event::wherestatus(1)->get();
    if(count($item) < 0){
        return abort(401);
    }
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
                $item=content_page::whereid($type[0]->link_option)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['item'=>$item,'type'=>$type,'main_menu'=>$main_menu]);

            }
            elseif($type[0]->url == '/who-is-who')
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

                                if(Count($data)>0){

                                $item=content_page::whereid($data[0]->link_option)->get();

                                if(Count($item)>0){

                                $data=content_page::whereparent_id($item[0]->id)->get();

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

                    }elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'info3')
                    {

                                $data=QuickLink::whereslug($slug)->get('link_option');

                                if(Count($data)>0){
                                $item=content_page::whereid($data[0]->link_option)->get();

                                if(Count($item)>0){

                                $data=content_page::whereparent_id($item[0]->id)->get();

                                return view('front.Layouts.child_pages.middle_section.home_section',['item'=>$item,'data'=>$data]);

                                }else{
                                    return abort(401);
                                }

                            }else{
                                return abort(401);
                            }
                    }
                    elseif(QuickLink::whereslug($slug)->first('section_name')->section_name == 'video-gallery')
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


                $departments=Department::get();

                if($request->dp){
                    $item=OrganisationStructure::where('department',6)
                            ->where('faculty_id',$request->dp)
                            ->paginate(9);

                }elseif($request->search){

                    $item=OrganisationStructure::where('department',6)
                            ->where('title',"like","%$request->search%")
                            ->orwhere('designation',"like","%$request->search%")
                            ->orwhere('email',"like","%$request->search%")
                            ->paginate(9);
                }else{

                    $item=OrganisationStructure::where('department',6)->paginate(9);
                }

                 $item->appends(['dp' => $request->dp]);
                if(count($item)>0){
                $type=SubMenu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.faculty',['item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu,'departments'=>$departments]);

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
            $item->appends(['year' => $request->year]);
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
            $chairpersons=OrganisationStructure::where('student_council','=','1')->get();
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
            $data=Events::wherestatus('1')->get();
            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){
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
            $item=org_journies::wherestatus(1)->get();
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

        //Placement-Reportsreport
        elseif($type[0]->url == '/Placement-Reports')
        {

            $data=SubMenu::whereslug($slug)->get();
            if(Count($data)>0){
            $item=report::wherestatus(1)->paginate(10);
            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){
            return view('front.Layouts.child_pages.menu_bar.main_menu.placment_report',['item'=>$item,'item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);

            }else{
                return abort(401);
            }
            }else{
                return abort(401);
            }
        }
        //Research-seminar
        elseif($type[0]->url == '/Research-seminar')
        {

            $data=SubMenu::whereslug($slug)->get();
            if(Count($data)>0){
            $item=researchSeminars::wherestatus(1)->paginate(10);

            if($request->search){
                $item=researchSeminars::
                          where('Speaker',"like","%$request->search%")
                        ->orwhere('Topic',"like","%$request->search%")
                        ->paginate(10);
            }else{

                $item=researchSeminars::wherestatus(1)->paginate(10);
            }

            $type=SubMenu::whereslug($slug)->get();
            if(count($type)>0){
            return view('front.Layouts.child_pages.menu_bar.main_menu.research-seminar',['item'=>$item,'item'=>$item,'type'=>$type,'sub_menu'=>$sub_menu]);

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
    }
    elseif('student-profile-more-info' == $main_slug)
    {
       // dd($main_slug);
           $item=StudentProfile::where('id',dDecrypt($slug))->where('status',1)->get();
        if(Count($item)>0){
            return view('front.Layouts.child_pages.student-profile.backup',compact('item'));
        }else{
            return abort(401);
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
            $item = StudentProfile::orderBy('sort')->where('status',1)->get();
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
            }

            elseif($slug == 'strategy')
            {
                $membersList=OrganisationStructure::where('faculty_id',13)->get();
            }

            else{

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
            elseif(isset($data[0]) && $data[0]->tpl_id == 12){     // Alumni Tema arc


                $item=OrganisationStructure::where('department',15)->paginate(9);

                if(count($item)>0){

                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.alumni-team-rc',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);

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

            elseif(isset($data[0]) && $data[0]->tpl_id == 7){     //mba testionials

                $item=OrganisationStructure::where('department',10)->paginate(9);
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
            elseif(isset($data[0]) && $data[0]->tpl_id == 13){     //mba analytics testionials


                $item=OrganisationStructure::where('department',16)->paginate(9);

                if(count($item)>0){

                    $type_sub=child_menu::whereslug($slug)->get();
                    $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                    $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                    $type_child=child_menu::whereslug($slug)->get();

                return view('front.Layouts.child_pages.menu_bar.main_menu.mba-analytics-testionials',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);

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

                }
                else{
                    $item=OrganisationStructure::whereid($data[0]->link_option)->get();
                     //dd($item);
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

            //dd($data[0]->url);

               $item=photo_gallery::whereid($data[0]->link_option)->get();
                if(Count($item)>0){
                $value=photo_gallery_image::wheregallery_id($item[0]->id)->get();
                 // dd($value);
                $type_sub=child_menu::whereslug($slug)->get();
                $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                $type_child=child_menu::whereslug($slug)->get();
                return view('front.Layouts.child_pages.menu_bar.main_menu.master',['value'=>$value,'item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
                }

        }elseif($data[0]->url == '/dissertation'){

            $item=dissertation::where('status',1)->get();
            if(Count($item)>0){
                $type_sub=child_menu::whereslug($slug)->get();
                $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
                $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
                $type_child=child_menu::whereslug($slug)->get();
                $item=dissertation::where('status',1)->paginate(10);
            return view('front.Layouts.child_pages.menu_bar.main_menu.dissertation',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
            }else{
                return abort(401);
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

   public function sc_st_obc(Request $request){

    $request->validate(
        [
            'name' => 'required|max:32|min:2',
            'mobile_no'=>'required|numeric|min:10|numeric|digits:10',
       ]
   );
    $data= new scstobc_forms;
    $data->name=$request->name;
    $data->Type=$request->Type;
    $data->roll_no=$request->roll_no;
    $data->Discrimination=$request->Discrimination;
    $data->Complaint_Details=$request->Complaint_Details;
    $data->mobile_no=$request->mobile_no;
    $path=public_path('admin/scstobc-image');
    if($request->hasFile('image')){
        $file2=$request->file('image');
        $newname2= time().rand(10,99).'.'.$file2->getClientOriginalExtension();
        $file2->move($path, $newname2);
        $data->image= $newname2;
    }
    $data->save();
    return back()->with(['success'=>'sc st obc form Add Successfully!']);
}



}
