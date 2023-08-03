<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\SiteLayout;
use App\Models\FileToUrl;
use App;
use App\Models\VisitorCount;
use App\Models\Announcement;
use App\Models\OptionsDump;
use Helper;


class UIController extends Controller
{
    function SetLang(Request $request){

       // dd($request->all());
        session()->put('Lang', $request->data);
        App::setLocale($request->data);
        return response()->json(['data'=>$request->data,True]);
    }

     function CreateForm(Request $request){
      $table=$request->data;
      $data= Schema::getColumnListing($table);
      TextForm($data,$table);
      IntegerForm($data,$table);
      TextareaForm($data,$table);
    }

    function CForm(Request $request){
            $data=OptionsDump::where('type','custom')->get();
            return view('admin.sections.dynamic-form',compact('data'));
    }

    function Front($page,$slug=null){
        return $page;
    }



    function MTopBar(){
        $data=SiteLayout::where('type','Header')->orderBy('id','DESC')->get();
        return view('admin.ui.manage_topbar',compact('data'));
    }

    function Add_Topbar(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|unique:site_layouts',
                'file'=>'required',
                'image'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            ]);
            $data=new SiteLayout;
            $data->name=ucwords(str_replace(" ",'_',$request->name));
            $data->type='Header';
            if($request->hasFile('image')){
                $path=public_path('uploads/ui');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            if($request->hasFile('file')){
                $path=base_path('resources/views/front/Layouts/headers');
                $file=$request->file('file');
                $newname= ucwords(str_replace(" ",'_',$request->name)).'.blade.php';
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->save();
            return redirect()->route('admin.topbar')->with('success','Header Layout Added Successfully');
        }
        return view('admin.ui.add_topbar');
    }


    function FileToURL(){
        $data=FileToUrl::orderBy('id','DESC')->cursor();
        return view('admin.sections.filetourl_manage',compact('data'));
    }


    function Delete_F2U($id){
        $data=FileToUrl::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }



    function Add_F2U(Request $request,$id=null){
        if($id){
             $title="Edit Client logo";
             $msg="Manage File2URL Edited Successfully!";
             $data=FileToUrl::find(dDecrypt($id));

         }
         else{
              $title="Add Client logo";
              $msg="Organisation Structure Added Successfully!";
              $data=new FileToUrl;
         }

        if($request->isMethod('post')){

            if($id){
                $request->validate([
                    'type'=>'required',
                    'title'=>'required',
                    'file'=>'required|mimes:jpg,jpeg,gif,png',
                ]);
                }
                else{
                  $request->validate([
                    'type'=>'required',
                    'title'=>'required',
                    'file'=>'required|mimes:jpg,jpeg,gif,png',
                ]);
                }

            $data->title=ucwords($request->title);
            $data->type=$request->type;
            if($request->hasFile('file')){
                $path=public_path('uploads');
                $file=$request->file('file');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->url=$request->url;
            $data->save();
            return redirect()->route('admin.filetourl')->with('success','Url created Successfully',$msg);
        }
         return view('admin.sections.filetourl_add',compact('data','title','id'));
        }




    function MSliderH(){
        $data=SiteLayout::where('type','Slider')->orderBy('id','DESC')->get();
        return view('admin.ui.manage_midbar',compact('data'));
    }

    function Add_MSlider(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|unique:site_layouts',
                'file'=>'required',
                'image'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            ]);
            $data=new SiteLayout;
            $data->name=ucwords(str_replace(" ",'_',$request->name));
            $data->type='Slider';
            if($request->hasFile('image')){
                $path=public_path('uploads/ui');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
             if($request->hasFile('file')){
                $path=base_path('resources/views/front/Layouts/home_sections');
                $file=$request->file('file');
                $newname= ucwords(str_replace(" ",'_',$request->name)).'.blade.php';
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->save();
            return redirect()->route('admin.homeslider')->with('success','Slider Layout Added Successfully');
        }
        return view('admin.ui.add_midbar');
    }

    function MFooterS(){
        $data=SiteLayout::where('type','Footer')->orderBy('id','DESC')->get();
        return view('admin.ui.manage_footerbar',compact('data'));
    }

    function Add_Footbar(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|unique:site_layouts',
                'file'=>'required',
                'image'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            ]);
            $data=new SiteLayout;
            $data->name=ucwords(str_replace(" ",'_',$request->name));
            $data->type='Footer';
            if($request->hasFile('image')){
                $path=public_path('uploads/ui');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
             if($request->hasFile('file')){
                $path=base_path('resources/views/front/Layouts/footers');
                $file=$request->file('file');
                $newname= ucwords(str_replace(" ",'_',$request->name)).'.blade.php';
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->save();
            return redirect()->route('admin.footer')->with('success','Footer Layout Added Successfully');
        }
        return view('admin.ui.add_footerbar');
    }

    function MAboutH(){
          $data=SiteLayout::where('type','About')->orderBy('id','DESC')->get();
        return view('admin.ui.manage_about_h',compact('data'));
    }

    function Add_AboutH(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|unique:site_layouts',
                'file'=>'required',
                'image'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            ]);
            $data=new SiteLayout;
            $data->name=ucwords(str_replace(" ",'_',$request->name));
            $data->type='About';
            if($request->hasFile('image')){
                $path=public_path('uploads/ui');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
             if($request->hasFile('file')){
                $path=base_path('resources/views/front/Layouts/home_sections');
                $file=$request->file('file');
                $newname= ucwords(str_replace(" ",'_',$request->name)).'.blade.php';
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->save();
            return redirect()->route('admin.homeabout')->with('success','About Section Layout Added Successfully');
        }
        return view('admin.ui.add_about_h');
    }

    function MUSP(){
          $data=SiteLayout::where('type','USP')->orderBy('id','DESC')->get();
        return view('admin.ui.manage_usps',compact('data'));
    }

    function MUPC(){
          $data=SiteLayout::where('type','Upcoming')->orderBy('id','DESC')->get();
        return view('admin.ui.manage_upcoming',compact('data'));
    }

    function MHG(){
          $data=SiteLayout::where('type','Gallery')->orderBy('id','DESC')->get();
        return view('admin.ui.manage_homegallery',compact('data'));
    }

    function Add_USP(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|unique:site_layouts',
                'file'=>'required',
                'image'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            ]);
            $data=new SiteLayout;
            $data->name=ucwords(str_replace(" ",'_',$request->name));
            $data->type='USP';
            if($request->hasFile('image')){
                $path=public_path('uploads/ui');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
             if($request->hasFile('file')){
                $path=base_path('resources/views/front/Layouts/home_sections');
                $file=$request->file('file');
                $newname= ucwords(str_replace(" ",'_',$request->name)).'.blade.php';
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->save();
            return redirect()->route('admin.usps')->with('success','USP Section Layout Added Successfully');
        }
        return view('admin.ui.add_usp');
    }


    function Add_HG(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|unique:site_layouts',
                'file'=>'required',
                'image'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            ]);
            $data=new SiteLayout;
            $data->name=ucwords(str_replace(" ",'_',$request->name));
            $data->type='Gallery';
            if($request->hasFile('image')){
                $path=public_path('uploads/ui');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
             if($request->hasFile('file')){
                $path=base_path('resources/views/front/Layouts/home_sections');
                $file=$request->file('file');
                $newname= ucwords(str_replace(" ",'_',$request->name)).'.blade.php';
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->save();
            return redirect()->route('admin.homegallery')->with('success','Gallery Section Layout Added Successfully');
        }
        return view('admin.ui.add_homegallery');
    }

    function Add_PCH(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required|unique:site_layouts',
                'file'=>'required',
                'image'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            ]);
            $data=new SiteLayout;
            $data->name=ucwords(str_replace(" ",'_',$request->name));
            $data->type='Upcoming';
            if($request->hasFile('image')){
                $path=public_path('uploads/ui');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
             if($request->hasFile('file')){
                $path=base_path('resources/views/front/Layouts/home_sections');
                $file=$request->file('file');
                $newname= ucwords(str_replace(" ",'_',$request->name)).'.blade.php';
                $file->move($path, $newname);
                $data->file= $newname;
            }
            $data->save();
            return redirect()->route('admin.upcoming')->with('success','Upcoming Section Layout Added Successfully');
        }
        return view('admin.ui.add_upcoming');
    }

    function DBActions(Request $request){

        //misclenious actions
        //visitor counter delete after 365 days
        $date_365=Date('d-m-Y', strtotime('-365 days'));
        $db_update=VisitorCount::where('last_update',date('d-m-Y'))->orderBy('id','DESC')->first();
        if(!$db_update){
            VisitorCount::where('last_update',$date_365)->delete();
        }
        //changing status after end date
        $data=Announcement::whereNotNull('end_time')->where('end_time','!=',0)->where('end_time','<=',time())->where('status',1)->get();
        foreach($data as $D){
            Announcement::find($D->id)->update(['status'=>0]);
        }
        //updating visitor count
        $data1= VisitorCount::where('ip',$request->ip())->where('last_update',date('d-m-Y'))->first();

        if(!$data1){
            $data11=VisitorCount::orderBy('id','DESC')->first();
            if($data11){
                $counter=$data11->counter;
            }
            else{
                $counter=0;
            }
            $input=new VisitorCount;
            $input->ip= $request->ip();
            $input->counter=$counter + 1;
            $input->date=date('d-m-Y H:i:s');
            $input->time=time();
            $input->last_update=date('d-m-Y');
            $input->save();
        }
    }

    //end
}
