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


class middleFormController extends Controller
{


   //news and event
    public function show_NewsEvent($id){
        $data=news_event::find(dDecrypt($id))->first();
        $data=news_event::where('id',$data->id)->first();
        return view('admin.sections.view',['data'=>$data]);
    }

    function View_NewsEvent(){
        $data=news_event::orderBy('id','DESC')->cursor();
        return view('admin.sections.manageNewsEvent',compact('data'));
        }

        function add_edit_NewsEvent(Request $request,$id=null){

            if($id){
                $title="Edit News & Event";
                $data= news_event::find(dDecrypt($id));
                $msg="News & Event Edited Successfully";
            }
            else{
                $title="Add News & Event";
                $data=new  news_event;
                $msg="News & Event Added Successfully";
            }
            if($request->isMethod('post')){
                if($id){
                $request->validate([

                    'title'=>'required',
                    'title_h'=>'required',
                    'file'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);
                }
                else{
                     $request->validate([
                        'title'=>'required',
                        'title'=>'required','unique:news_events',
                        'title_h'=>'required',
                        'file'  =>  'image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);
                }
                $data->title=$request->title;
                $data->title_h=$request->title_h;
                $data->file_title=$request->file_title;
                $data->file_alt=$request->file_alt;
                $data->slug=SlugCheck('news_events',($request->title));
                $data->status=$request->status;
                $data->status=$request->status;
                $data->external=$request->external;
                $data->url=$request->url;
                $data->type=$request->type;

                if($request->hasFile('file')){
                    $path=public_path('uploads/news_event');
                    $file=$request->file('file');
                    $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $file->move($path, $newname);
                    $data->image= $newname;
                }
                $data->save();
                return redirect('/Accounts/News-Event')->with('success',$msg);
            }
            return view('admin.sections.addNewsEvent',compact('data','id','title'));

        }

        public function delete_NewsEvent($id){

        $exit = news_event::where('id',dDecrypt($id))->first();
        if(!empty($exit)){
            news_event::find(dDecrypt($id))->delete();
        }else{
            return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
        }
        return redirect()->back()->with('success','Record Deleted Successfully');


        }



  //industry
    public function Show_industry($id){
        $data=Industry::find(dDecrypt($id))->first();
        $data=Industry::where('id',$data->id)->first();
        return view('admin.sections.view_industry',['data'=>$data]);
    }

    public function View_industry(){
        $data=Industry::orderBy('id')->get();
        return view('admin.sections.viewindustry',['data'=>$data]);
        }


    public function delete_industry($id){
        $exit = Industry::where('id',dDecrypt($id))->first();
        if(!empty($exit)){
            Industry::find(dDecrypt($id))->delete();
        }else{
            return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
        }
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

     public function add_edit_industry(Request $request,$id=NULL){
     if($id){

        $title="Edit Details";
        $msg="Details Edited Successfully!";
        $data=Industry::find(dDecrypt($id));
        }
    else{

          $title="Add Details";
          $msg="Details Added Successfully!";
          $data=new Industry;
          }

    if($request->isMethod('post')){
        if(!$id){
            $request->validate([
                "attachement_file"  =>  "mimes:pdf|max:10000",
                'title'=>'required|unique:industry',
            ]);}
        else{
        $request->validate([

            "attachement_file"  =>  "mimes:pdf|max:10000",

        ]);
    }


          $data->date= $request->date;
          $data->title= $request->title;

          if($request->hasFile('attachement_file')){
              $data->pdfsize=$request->attachement_file->getSize();
              $file=$request->file('attachement_file');
              $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
              $path=public_path('uploads/view/attach');
              $file->move($path, $newname);
              $data->attachement_file  = $newname;
          }
          $data->save();

        return redirect()->route('admin.industry')->with('success',$msg);
    }

    return view('admin.sections.industry',compact('data','title','id'));
    }




}
