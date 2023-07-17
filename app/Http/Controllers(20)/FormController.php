<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use App\Models\Announcement;
use App\Models\URLList;
use App\Models\multiple_profile;
use App\Models\department_profile;
use App\Models\OrganisationStructure;
use DB;
use Str;

class FormController extends Controller
{
    function View_OrganisationStructure(){
        $data=OrganisationStructure::orderBy('id','DESC')->cursor();

        return view('admin.sections.OrganisationStructure',compact('data'));
    }

    function Delete_OrganisationStructure($id){
        $data=OrganisationStructure::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }


    function Add_OrganisationStructure(Request $request,$id=null){

        if($id){
            $title="Edit Organisation Structure";
            $msg="Organisation Structure Edited Successfully!";
            $data=OrganisationStructure::find(dDecrypt($id));
        }
        else{
             $title="Add Organisation Structure";
            $msg="Organisation Structure Added Successfully!";
           // dd($request);
            $data=new OrganisationStructure;
        }

        if($request->isMethod('post')){
            $request->validate([
                'title'=>'required',
                'type'=>'required',
                'phone'=>'required',
                'email'=>'required',
            ]);
            $data->type=$request->type;
            $data->title=ucwords($request->title);
            $data->title_h=$request->title_h;
            $data->description= $request->description;
            $data->description_h= $request->description_h;
            $data->department= $request->department;
            $data->department_h= $request->department_h;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->extension=$request->extension;
            $data->designation= $request->designation;
            $data->designation_h= $request->designation_h;

//social mediea links
            $data->slug=SlugCheck('organisation_structures',($request->title));
            $data->status= $request->status;
            $data->instagram= $request->instagram;
            $data->Instagram_title= $request->Instagram_title;
            $data->Facebook= $request->Facebook;
            $data->Facebook_title=$request->Facebook_title;
            $data->twitter=$request->twitter;
            $data->Twitter_title=$request->Twitter_title;
            $data->linkedin= $request->linkedin;
            $data->	linkedIn_title= $request->linkedIn_title;
            $data->orcid= $request->orcid;
            $data->orcid_title=$request->orcid_title;
            $data->webofscience=$request->webofscience;
            $data->webofscience_title=$request->webofscience_title;
            $data->scopus= $request->scopus;
            $data->	scopus_title= $request->scopus_title;
            $data->scholar= $request->scholar;
            $data->scholar_title= $request->scholar_title;

            $path=public_path('uploads/organisation');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }

            $data->save();
            return redirect()->route('admin.people')->with('success',$msg);
        }

        return view('admin.sections.addOrganisationStructure',compact('data','title','id'));
    }

 //profile biography


    function View_biography($id){
        $data= multiple_profile::where('parent_id','=',$id)->orderBy('id','DESC')->get();
        return view('admin.sections.manage_profile_details',(['data'=>$data]));
    }

    function Delete_biography($id){
        $data=multiple_profile::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }


    function Add_biography(Request $request,$id=null){

        if($id){

            $title="Edit Organisation profile";
            $msg="Organisation profile Edited Successfully!";
            $data=multiple_profile::find(dDecrypt($id));

        }
        else{
             $title="Add Organisation profile";
             $msg="Organisation profile Added Successfully!";
             $data=new multiple_profile;


        if($request->isMethod('post')){
            $request->validate([
                'Title'=>'required',

            ]);

            $data->Title=Str::title($request->Title);
            $data->title_h=$request->title_h;


            $path=public_path('uploads/organisation');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }


            $data->Image_Title=$request->Image_Title;
            $data->description=$request->description;
            $data->description_h=$request->description_h;
            $data->parent_id=$request->parent_id;
            $data->Status=$request->status;

            $parent=$request->parent_id;

            //dd($data);
            $data->save();

            return redirect('Accounts/manage-people-profile'.'/'.$request->parent_id)->with('success',$msg);
        }

       // dd($data);
        return view('admin.sections.addprofile_details',compact('data','title','id'));
    }










     function refreshCaptcha(){
        return response()->json(['captcha'=> captcha_img("math")]);
    }

    function Delete_Announcement($id){
        $data= Announcement::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    function View_Announcements(Request $request,$type=''){
        $limit=20;
        if(isset($request->limit))$limit=$request->limit;
        else $request->limit=$limit;

        if($type!=''){
            if(isset($request->q))
            $data=Announcement::where('type',$type)->where( 'title', 'LIKE', '%' . $request->q . '%' )->orWhere ( 'title_h', 'LIKE', '%' . $request->q . '%' )->orderBy('id','DESC')->paginate($limit);
            else $data=Announcement::where('type',$type)->orderBy('id','DESC')->paginate($limit);

        } else {
            if(isset($request->q))
            $data=Announcement::where( 'title', 'LIKE', '%' . $request->q . '%' )->orWhere ( 'title_h', 'LIKE', '%' . $request->q . '%' )->orderBy('id','DESC')->paginate($limit);
            else $data=Announcement::orderBy('id','DESC')->paginate($limit);

        }
        return view('admin.sections.announcements',['data'=>$data]);
    }

    function Add_Announcement(Request $request,$id=null){
        if($id){
            $title="Edit Entry";
            $msg="Entry Edited Successfully!";
            $data=Announcement::find(dDecrypt($id));
        }
        else{
             $title="Add New Entry";
            $msg="New Entry Added Successfully!";
            $data=new Announcement;
        }

        if($request->isMethod('post')){
            $request->validate([
                'title'=>'required',
                'type'=>'required',
                'description'=>'required',
                'meta_title'=>'required',
                'meta_keywords'=>'required',
                'meta_description'=>'required',
            ]);
            if($request->end_date!='' || $request->end_date!=null){
            if(strtotime($request->start_date) > strtotime($request->end_date)){
                return redirect()->back()->with('error','End date should always be greater than start date');
            }
            }
            $data->title=$request->title;
            $url=URLList::where('type',$request->type)->first();
            $data->slug=$url->url.'/'.SlugCheck('announcements',$request->title);
            $data->title_h=$request->title_h;
            $data->description= $request->description;
            $data->description_h= $request->description_h;
            $data->type=$request->type;
            $data->meta_title= $request->meta_title;
            $data->meta_keywords= $request->meta_keywords;
            $data->meta_description= $request->meta_description;
            $data->image_title=$request->image_title;
            $data->image_alt=$request->image_alt;
            $data->banner_title=$request->banner_title;
            $data->banner_alt=$request->banner_alt;
            $data->external_link=$request->external_link;
            $data->is_link_to_document=($request->is_link_to_document?1:0);
            if($request->start_date!='' || $request->start_date!=null){
            $data->start_date= date('d-m-Y',strtotime($request->start_date));
            $data->start_time= strtotime($request->start_date);
            }
            else{
                 $data->start_date= date('d-m-Y');
                 $data->start_time= time();
            }

            $data->end_time= strtotime($request->end_date);
            $data->end_date= date('d-m-Y',strtotime($request->end_date));

            $path=public_path('uploads');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            if($request->hasFile('document')){
                $file1=$request->file('document');
                $newname1= time().rand(10,99).'.'.$file1->getClientOriginalExtension();
                if(strtolower($file1->getClientOriginalExtension())=='pdf'){
                    $file1->move($path, $newname1);
                    $data->related_docs= $newname1;
                }
            }
            if($request->hasFile('banner_image')){
                $file2=$request->file('banner_image');
                $newname2= time().rand(10,99).'.'.$file2->getClientOriginalExtension();
                $file2->move($path, $newname2);
                $data->banner_image= $newname2;
            }
            $data->save();
            return redirect()->route('admin.announcements')->with('success',$msg);
        }

        return view('admin.sections.addAnnouncement',compact('data','title','id'));
    }













    function Delete_Role($id){
        Role::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Role deleted Successfully');
    }

    function Add_Roles(Request $request){

        if($request->isMethod('post')){
            $request->validate([
                'name'=> 'required|unique:roles',
            ]);
             if($request->name =='SuperAdmin' || $request->name=='superadmin' || $request->name=='superAdmin' || $request->name=='Superadmin'){
                return redirect()->back()->with('error','action forbidden');
            }
            $data= new Role;
            $data->name= ucwords($request->name);
            $data->guard_name='admin';
            $data->save();
            return redirect()->route('admin.roles')->with('success','Role Added Successfully');
        }
        return view('admin.users.addRole');
    }

    function Assign_Roles(Request $request,$id){
        $user=Admin::find(dDecrypt($id));
        $roles=$user->getRoleNames();
        $data=Role::where('name','!=','Super Admin')->orderBy('name','ASC')->cursor();
        if($request->isMethod('post')){
            $request->validate([
                'role'=>'required'
            ]);
            $user->roles()->detach();
            foreach($request->role as $r){
            $user->assignRole($r);
            }
            return redirect()->route('admin.manageadmin')->with('success','Role assigned Successfully to '.$user->name);
        }
        return view('admin.users.assignrole')->with(compact('data','id','user','roles'));

    }

    function Add_Permissions(Request $request,$id){
        $roles=Role::find(dDecrypt($id));
        $perms=$roles->getAllPermissions();
        $routes =  \Route::getRoutes();
        foreach ($routes as $value) {
             if(str_contains($value->getActionname(), 'App\Http\Controllers\AdminController') || str_contains($value->getActionname(), 'App\Http\Controllers\FormController')  || str_contains($value->getActionname(), 'App\Http\Controllers\blogcontroller')  || str_contains($value->getActionname(), 'App\Http\Controllers\gallaycontroller') || str_contains($value->getActionname(), 'App\Http\Controllers\pagecontroller') || str_contains($value->getActionname(), 'App\Http\Controllers\quicklinkcontrller')  || str_contains($value->getActionname(), 'App\Http\Controllers\vidoecontroller')){
                $action = explode("@",$value->getActionname());
             $permissions=Permission::where('name',$action[1])->first();
             if(!$permissions){
                Permission::create(['name'=>$action[1],'guard_name'=>'admin']);
             }
            }
        }
        $data=Permission::whereNotIn('name', ['Login','refreshCaptcha','Dashboard','Logout','Change_Password','ForgotPSW'])->orderBy('name','ASC')->cursor();
       if($request->isMethod('post')){
        foreach($request->role as $val){
            $per[]= $val;
            }
            $roles->permissions()->sync($per);
            return redirect()->route('admin.roles')->with('success','Permissions Assigned to Role Successfully');
        }

        return view('admin.users.permissions')->with(compact('data','id','roles','perms'));
}

    }
//end
}
