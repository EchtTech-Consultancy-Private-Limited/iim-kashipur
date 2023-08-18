<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


class menuFormController extends Controller
{

//student council
public function View_studentCouncil()
{
    $data=\App\Models\student_council::get();
    return view('admin.sections.manage_student_council',['data'=>$data]);
}

public function Add_Edit_StudentCouncil(Request $request,$id=null)
{
    $profile=OrganisationStructure::get();
    if($id){

        $title="Edit student council Section";
        $msg="student council Section Edited Successfully!";
        $data=student_council::find(dDecrypt($id));
    }
    else{

        $title="Add student council Section";
        $msg="student council Section Added Successfully!";
        $data=new student_council;
    }

        if($request->isMethod('post')){
            if(!$id){
                $request->validate([
                    'imagename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
                    "attachement_file"            => "mimes:pdf|max:10000",
                    'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',
                    'student_council'=>'required|unique:student_councils',
                ]);}
            else{
            $request->validate([
                 'imagename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
                 "attachement_file"            =>          "mimes:pdf|max:10000",
                 'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

            ]);
        }

        $data->student_council=$request->student_council;
        $data->chairperson=$request->chairperson;
        $data->about_details=$request->about_details;
        $data->status=$request->status;

        $data->banner_title= $request->banner_title;
        $data->banner_alt= $request->banner_alt;
        $path=public_path('page/banner');
        if($request->hasFile('bannerimage')){
            $file=$request->file('bannerimage');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->bannerimage= $newname;
        }



        $data->save();
        return redirect('/Accounts/student-council')->with('success',$msg);
    }
    return view('admin.sections.add_student_council',compact('data','title','id','profile'));

}


    public function Delete_StudentCouncil($id){
        $data=student_council::find(dDecrypt($id));
        $data->delete();
     return redirect()->back()->with('success','committee deleted Successfully');
    }


    public function  Show_studentCouncil($id){
        $data=student_council::find(dDecrypt($id))->first();
        $data=student_council::where('id',$data->id)->first();
          $profile=OrganisationStructure::get();
        return view('admin.sections.view_StudentConsil',['data'=>$data,'profile'=>$profile]);
    }

//journal_publications
public function View_journalPublications(){
    $data=\App\Models\journal_publication::get();
    return view('admin.sections.managejournalpublications',['data'=>$data]);
}


    public function show_journalPublications($id){
           $data=journal_publication::find(dDecrypt($id))->first();
           $data=journal_publication::where('id',$data->id)->first();
     return view('admin.sections.view_journal_publication',['data'=>$data]);
    }



public function Add_Edit_journalPublications(Request $request,$id=null)
{
    if($id){
        $title="Edit journal publications Section";
        $msg="journal publications Section Edited Successfully!";
        $data=journal_publication::find(dDecrypt($id));
    }
    else{
        $title="Add journal publications Section";
        $msg="journal publications Section Added Successfully!";
        $data=new journal_publication;

        //child journal_publication_child
    }



        if($request->isMethod('post')){
            if(!$id){
                $request->validate([
                'title'=>'required|unique:journal_publications',

                ]);}
            else{
            $request->validate([
                'title'=>'required',
            ]);
        }


        $data->title=$request->title;
        $data->external=$request->external;
        $data->url=$request->url1;
        $data->year=$request->year;
        $data->archive_date=$request->archive_date;
        $data->status=$request->status;

        $data->save();
        return redirect('/Accounts/journal-publications')->with('success',$msg);
    }
    return view('admin.sections.add_journal_publications',compact('data','title','id'));
}

    public function Delete_journalPublications($id){
    $data=journal_publication::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','journal publications deleted Successfully');
    }




//journal publications page
public function View_journalPublications_Child($id){
    $id=$id;
    $data=\App\Models\journal_publication_child::where('parent_id',dDecrypt($id))->get();
    return view('admin.sections.journal_publications_page',['data'=>$data,'id'=>$id]);
}



public function Add_Edit_journalPublications_Child(Request $request,$id=null)
{
    if($id){
        $title="Edit journal publications Section";
        $msg="journal publications Section Edited Successfully!";
        $data=journal_publication_child::find($id);
    }
    else{
        $title="Add journal publications Section";
        $msg="journal publications Section Added Successfully!";
        $data=new journal_publication_child;

        //child journal_publication_child
    }
    if($request->isMethod('post')){
        if(!$id){
            $request->validate([
            'url'=>'required|unique:journal_publication_childs',

            ]);}
        else{
        $request->validate([
            'url'=>'required',
        ]);
    }
        $data->url=$request->url;
        $data->about_details=$request->about_details;
        $data->status=$request->status;
        $data->parent_id=dDecrypt($request->parent_id);
        $data->save();
        return back()->with('success',$msg);
    }
    return view('admin.sections.add_journal_publications_page',compact('data','title','id'));

}

    public function Delete_journalPublications_child($id){
    $data=journal_publication_child::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','journal publications deleted Successfully');
    }




//Wellness-Facilities
public function show_WellnessFacilities($id){
    $data=wellness_facilitie::find(dDecrypt($id))->first();
    $data=wellness_facilitie::where('id',$data->id)->first();
return view('admin.sections.view_wellness_facility',['data'=>$data]);
}

public function View_WellnessFacilities(){
    $data=\App\Models\wellness_facilitie::get();
    return view('admin.sections.manage_WellnessFacilities',['data'=>$data]);
}

public function add_Edit_WellnessFacilities(Request $request,$id=null)
{
    if($id){
        $title="Edit wellness facilities Section";
        $msg="wellness facilities Edited Successfully!";
        $data=wellness_facilitie::find(dDecrypt($id));
    }
    else{
        $title="wellness facilities Section";
        $msg="wellness facilities Added Successfully!";
        $data=new wellness_facilitie;
    }

        if($request->isMethod('post')){
            if($id){
               $request->validate([
                'title'=>'required',
                'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

              ]);}
            else{
            $request->validate([

                'title'=>'required|unique:wellness_facilities',
                'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',
            ]);
            }

        $data->title=$request->title;
        $data->status=$request->status;
        $data->about_details=$request->about_details;
        $data->DESCRIPTION=$request->activites;


        $data->banner_title= $request->banner_title;
        $data->banner_alt= $request->banner_alt;
        $path=public_path('page/banner');
        if($request->hasFile('bannerimage')){
            $file=$request->file('bannerimage');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->bannerimage= $newname;
        }


        $data->Events=$request->event;

        $data->save();
        return redirect('/Accounts/Wellness-Facilities')->with('success',$msg);
    }
    return view('admin.sections.add_WellnessFacilities',compact('data','title','id'));

}

    public function delete_WellnessFacilities($id){
    $data=wellness_facilitie::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','journal publications deleted Successfully');
    }


 //wellness_facilitie_image
 public function show_WellnessFacilitiesImage($id){
    $data=wellness_facilitie_image::find(dDecrypt($id))->first();
    $data=wellness_facilitie_image::where('id',$data->id)->first();
return view('admin.sections.view_StudentConsil',['data'=>$data]);
}


 public function view_WellnessImages($id)
  {
     $data=wellness_facilitie_image::whereparent_id(dDecrypt($id))->get();
     $id=dDecrypt($id);
    return view('admin.sections.manage_Wellness_image',['data'=>$data,'id'=>$id]);
  }

  public function delete_WellnessImages($id){
    $data=wellness_facilitie_image::find(dDecrypt($id));
    $data->delete();
  return redirect()->back()->with('success','committee deleted Successfully');
  }


  public function add_WellnessImage(Request $request){

      $request->validate(

          [

            'filename'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',
            'image_title'=>'required|unique:wellness_facilitie_images',

          ]


      );
    //data in database
    $data= new wellness_facilitie_image();
    $data->image_title= $request->image_text;
    $data->image_alt= $request->image_alt;
    $data->event= $request->event;
    $data->parent_id=$request->parent_id;
    $data->DESCRIPTION=$request->DESCRIPTION;
    $data->sort_order=$request->sort_order;
    $data->status= $request->status;

    $path=public_path('uploads/wellness/');
    if($request->hasFile('filename')){
        $file=$request->file('filename');
        $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
        $file->move($path, $newname);
        $data->image= $newname;
    }
    $data->save();
    return back()->with('success','Record save Successfully');

  }

  public function edit_WellnessImage(Request $request,$id)
  {
     $request->validate(
        [

            'filename'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',
            'image_title'=>'required',

        ]
       );
    $data=wellness_facilitie_image::find($request->id);
    $data->image_title= $request->image_text;
    $data->image_alt= $request->image_alt;
    $data->event= $request->event;
    $data->parent_id=$request->parent_id;
    $data->sort_order=$request->sort_order;
    $data->DESCRIPTION=$request->DESCRIPTION;

    $data->status= $request->status;
    $path=public_path('uploads/wellness/');
    if($request->hasFile('filename')){
        $file=$request->file('filename');
        $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
        $file->move($path, $newname);
        $data->image= $newname;
    }
    $data->save();
    return back()->with('success','Record Edit Successfully');
  }

//org journey

   public function Show_journey($id){
    $data=org_journies::find(dDecrypt($id))->first();
    $data=org_journies::where('id',$data->id)->first();
    return view('admin.sections.view_journey',['data'=>$data]);
}


public function Delete_journey($id){
    $exit = org_journies::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        org_journies::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');

}

function View_journey(){
    $data=org_journies::orderBy('id','DESC')->cursor();
    return view('admin.sections.managejourney',compact('data'));
}

        function Add_Edit_journey(Request $request,$id=null){

            if($id){
                $title="Edit Org Journey";
                $data= org_journies::find(dDecrypt($id));
                $msg="Org Journey Edited Successfully";
            }
            else{
                $title="Add Org Journey";
                $data=new  org_journies;
                $msg="Org Journey Added Successfully";
            }
            if($request->isMethod('post')){
                if($id){
                $request->validate([

                    'number'=>'required',
                    'title_h'=>'required',
                    'title'=>'required',
                    'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
                ]);
                }
                else{
                     $request->validate([
                        'number'=>'required',
                        'title'=>'required|unique:org_journey',
                        'title_h'=>'required',
                        'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);
                }
                $data->year=$request->number;
                $data->title=$request->title;
                $data->title_h=$request->title_h;
                $data->heading=$request->heading;
                $data->heading_h=$request->heading_h;
                $data->slug=SlugCheck('org_journey',($request->title));
                $data->status=$request->status;
                if($request->hasFile('file')){
                    $path=public_path('uploads/JourneyOrg');
                    $file=$request->file('file');
                    $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $file->move($path, $newname);
                    $data->file= $newname;
                }
                $data->save();
                return redirect('/Accounts/Org-journey-index')->with('success',$msg);
            }
            return view('admin.sections.addjourney',compact('data','id','title'));

        }



//evnets & Activites
public function Add_Event_EventsActivites(Request $request,$id=NULL){
    if($id){
        $title="Edit Event & Activites Details";
        $msg="title Details Edited Successfully!";
        $data=Events::find(dDecrypt($id));
    }
    else{

          $title="Add Event & Activites Details";
          $msg="title Details Added Successfully!";
          $data=new Events;
        //  dd($request->all());
    }


        if($request->isMethod('post')){
            if(!$id){
                $request->validate([

                    'title'=>'required|unique:events&activities',
                ]);}
            else{
            $request->validate([

                'title'=>'required',
            ]);
        }
        $data->title=$request->title;
        $data->status= $request->status;
        $data->save();
       // dd($request->all());
       return redirect('Accounts/Event-Activites')->with('success',$msg);
    }

    return view('admin.sections.events&activities',compact('data','title','id'));
}

public function View_EventsActivites(){
    $data=Events:: orderBy('id')->get();
    return view('admin.sections.manageevents&activities',['data'=>$data]);
}

public function Delete_EventsActivites($id){

    $exit = Events::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        Events::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');
}



public function  Show_EventsActivites($id){

    $data=Events::find(dDecrypt($id))->first();
    $data=Events::where('id',$data->id)->first();
    return view('admin.sections.view_EventsActivety',['data'=>$data]);
}

//evnet and activty image
public function Delete_Event_Image($id){

$exit = event_image::where('id',dDecrypt($id))->first();
if(!empty($exit)){
    event_image::find(dDecrypt($id))->delete();
}else{
    return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
}
return redirect()->back()->with('success','Record Deleted Successfully');

}

 public function Add_Edit_EventActivity_Image(Request $request,$id=NULL){
 if($id){


    $title="Edit Details";
    $msg="Details Edited Successfully!";
    $event=event_image::find(dDecrypt($id));
    $data=Events::get();
    }
else{

      $title="Add Details";
      $msg="Details Added Successfully!";
      $event=new event_image;
      $data=Events::get();

}
 if($request->isMethod('post')){
    if(!$id){
        $request->validate([
            'image'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_title'=>'required|unique:events&activities_image',
        ]);}
    else{
    $request->validate([
        'image'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',

    ]);
}

      $event->image_title= $request->image_title;
      $event->image_alt= $request->image_alt;
      $event->order= $request->order;
      $event->status= $request->status;
      $event->parent_id=$request->parent_id;
      if($request->hasFile('image')){
          $file=$request->file('image');
          $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
          $path=public_path('uploads/multiple/event_image');
          $file->move($path, $newname);
          $event->image    = $newname;
      }
      $event->save();

    return back()->with('success',$msg);
}

return view('admin.sections.event&activitiesimage',compact('event','title','id','data'));
}

public function View_EventActivety_image($id)
{
$data=event_image::orderBy('id')->where('parent_id',$id)->get();
return view('admin.sections.event&activitiesimageview',['data'=>$data]);
}


public function  Show_EventActivety_image($id){

$data=event_image::find(dDecrypt($id))->first();
$data=event_image::where('id',$data->id)->first();

return view('admin.sections.view_event_activites_image',['data'=>$data]);
}





}
