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
use App\Models\FacultyDepartment;
use App\Models\Department;
use App\Models\cell;
use App\Models\commmittee;
use App\Models\club;
use App\Models\scstobc_forms;
use App\Models\feedback;
use App\Models\committee_multiple_image;
use App\Models\enquirie;
use Excel;
use App\Exports\Exportguidelinesparticipant;
use App\Models\club_multiple_image;
use App\Models\guidelinesparticipant;
use App\Models\cell_multiple_image;
use DB;
use Str;
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

class FormController extends Controller
{


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
           $data->tedx= $request->tedx;
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

    public function Delete_biography($id)
    {

       $exit = multiple_profile::where('id',dDecrypt($id))->first();
       if(!empty($exit)){
        multiple_profile::find(dDecrypt($id))->delete();
       }else{
           return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
       }
       return redirect()->back()->with('success','Record Deleted Successfully');

    }


     function refreshCaptcha(){
        return response()->json(['captcha'=> captcha_img("math")]);
    }

    function Delete_Announcement($id){
         $exit = Announcement::where('id',dDecrypt($id))->first();
        if(!empty($exit)){
            Announcement::find(dDecrypt($id))->delete();
        }else{
            return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
        }
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

        $exit = Role::where('id',dDecrypt($id))->first();
        if(!empty($exit)){
            Role::find(dDecrypt($id))->delete();
        }else{
            return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
        }
        return redirect()->back()->with('success','Record Deleted Successfully');


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
    //   /  dd($request);
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


        // dd($routes);
        foreach ($routes as $value)
         {

             if(str_contains($value->getActionname(), 'App\Http\Controllers\AdminController') || str_contains($value->getActionname(), 'App\Http\Controllers\FormController')   || str_contains($value->getActionname(), 'App\Http\Controllers\photoController') || str_contains($value->getActionname(), 'App\Http\Controllers\contentController') || str_contains($value->getActionname(), 'App\Http\Controllers\sectionController')  || str_contains($value->getActionname(), 'App\Http\Controllers\vidoecontroller')


             || str_contains($value->getActionname(), 'App\Http\Controllers\footerController')

             || str_contains($value->getActionname(), 'App\Http\Controllers\menuFormController')

             || str_contains($value->getActionname(), 'App\Http\Controllers\middleFormController')

             || str_contains($value->getActionname(), 'App\Http\Controllers\StudentProfileController')

             ){

             $action = explode("@",$value->getActionname());

             $actions = explode("\\",$action[0]);

             $permissions=Permission::where('name',$action[1])->first();

             if(!$permissions){
                Permission::create(['name'=>$action[1],'controller'=>$actions[count($actions)-1],'guard_name'=>'admin']);
             }

            }

        }

        $data=Permission::whereNotIn('name', ['Login','refreshCaptcha','Dashboard','Logout','Change_Password','ForgotPSW'])->orderBy('name','ASC')->cursor();

        $value = DB::table('permissions')->select('controller')->groupBy('controller')->get();

        //dd($value);

        if($request->isMethod('post')){
            foreach($request->role as $val){
                $per[]= $val;
                }
                $roles->permissions()->sync($per);

                return redirect()->route('admin.roles')->with('success','Permissions Assigned to Role Successfully');
            }

        return view('admin.users.permissions')->with(compact('data','id','roles','perms','value'));
}


public function view_biography($id)
{
    $data=\App\Models\multiple_profile::where('parent_id','=',dDecrypt($id))->orderBy('sort_id')->get();
    return view('admin.sections.manage_profile_details',['data'=>$data, 'id'=>dDecrypt($id)]);
}

//for data sort
public function datareorder(Request $request){
    $elementid = $request->elementid;
    
    $data=\App\Models\multiple_profile::where('parent_id','=',$elementid)->get();
        foreach ($data as $post) {
            $elementSortId = $post->id;
            
            foreach ($request->order as $order) {
                if ($order['id'] == $elementSortId) {
                    //$data->update(['sort_id' => $order['position']]);
                    DB::table('multiple_profile')
                    ->where('id', $elementSortId)
                    ->update(['sort_id' => $order['position']]);
                }
            }
            
            
            
        }

        //return response(['message' => 'Update Successfully'], 200);
}



public function Add_biography(Request $request,$id=null)
{

    if($id){
        $title="Edit profile Section";
        $msg="Profile Section Edited Successfully!";
        $data=multiple_profile::find(dDecrypt($id));
    }
    else{

         $title="Add profile Section";
        $msg="Profile Section Added Successfully!";
        $data=new multiple_profile;
    }

    if($request->isMethod('post')){
        if($id){
        $request->validate([

            'Title'=>'required','unique:multiple_profile',
        ]);
        }
        else{
            $request->validate([


            'Title'=>'required',


        ]);
    }

       // dd($request->all());
        $data->Title=$request->Title;
        $data->title_h=$request->title_h;
        // $data->Image=$request->Image;
        $data->heading=$request->heading;

        $path=public_path('uploads/organisation');
        if($request->hasFile('image')){

            $file=$request->file('image');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image= $newname;
        }
        $data->heading_h=$request->heading_h;
        $data->Image_Title=$request->Image_Title;
        $data->description=$request->description;
        $data->description_h=$request->description_h;
        $data->Status=$request->status;
        $data->parent_id=dDecrypt($request->parent_id);
        $data->save();
        return redirect()->route('admin.people')->with('success',$msg);
    }

    return view('admin.sections.addprofile_details',compact('data','title','id'));

}

//Ajax function

    public function rti_QUARTER_data(Request $request){
        $item=quarter_report::whereid($request->id)->first();
        return response()->json(['item'=>$item]);
    }

    public function Wellness_Facilities_index_id(Request $request){
        $item=wellness_facilitie_image::whereid($request->id)->first();
        return response()->json(['item'=>$item]);
    }

    public function rit_QUARTER(Request $request){
        $item=rit_report_section::whereid($request->id)->first();
        return response()->json(['item'=>$item]);
    }

    public function countact_us()
    {
     $data=feedback::whereform_type('contact_us')->get();
     return view ('admin.sections.manageContactus',['data'=>$data]);
    }

    public function feedback()
    {
      $data=feedback::whereform_type('feedback')->get();
     return view ('admin.sections.manageFeedback',['data'=>$data]);
    }

    public function View_enquirie()
    {
      $data=enquirie::get();
     return view ('admin.sections.manageEnquirie',['data'=>$data]);
    }


    public function pdf_section(Request $request){
        $item=rit_report_section::whereid($request->id)->first();
        return response()->json(['item'=>$item]);
    }

    public function View_guidelinesParticipants(){
      $data=guidelinesparticipant::get();
     return view ('admin.sections.mangeGuidelinesParticipants',['data'=>$data]);
    }



//-----------------------------------------------------------------------------------------------------------//


//cell
public function Show_Cell($id){
    $data=cell::find(dDecrypt($id))->first();
    $data=cell::where('id',$data->id)->first();
    $profile=OrganisationStructure::get();
    return view('admin.sections.view_cell',['data'=>$data,'profile'=>$profile]);
}

public function Add_Edit_Cells(Request $request,$id=null){
    $profile=OrganisationStructure::get();
    if($id){
        $title="Edit Cells Details";
        $msg="Cells Details Edited Successfully!";
        $data=cell::find(dDecrypt($id));
    }
    else{

          $title="Add Cells Details";
          $msg="Cells Details Added Successfully!";
          $data=new cell;
    }


        if($request->isMethod('post')){
            if($id){
            $request->validate([

                'title'=>'required',
                'Cell_logo'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'Cell_image'  =>   'image|mimes:jpeg,png,jpg,gif|max:2048',
                'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

            ]);
            }
            else{
                $request->validate([

                    'title'=>'required|unique:cells',
                    'Cell_logo'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'Cell_image'  =>   'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

            ]);
        }

        $data->title=$request->title;
        $data->chairperson= $request->chairperson;
        $data->about_details= $request->about_details;
        $data->activites= $request->activites;
        $data->status= $request->status;
        $data->event= $request->event;
        $data->slug=SlugCheck('cells',($request->title));
        $data->logo_title= $request->cell_logo_title;
        $data->logo_alt= $request->cell_logo_alt;
        $data->image_title= $request->cell_image_title;
        $data->image_alt= $request->cell_image_alt;

        $path=public_path('uploads/club');
        if($request->hasFile('Cell_logo')){
            $file=$request->file('Cell_logo');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->logo= $newname;
        }
        $path=public_path('uploads/club');
        if($request->hasFile('Cell_image')){
            $file=$request->file('Cell_image');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image= $newname;
        }

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
       return redirect('Accounts/manage-cells')->with('success',$msg);
    }

    return view('admin.sections.add_cells',compact('data','title','id','profile'));
}

public function View_cells(){
    $data=cell:: orderBy('id')->get();
    return view('admin.sections.managecells',['data'=>$data]);
}



function Delete_cells($id){

    $exit = cell::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        cell::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');
}

//cells images
public function Delete_cellsImage($id){

    $exit = cell_multiple_image::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        cell_multiple_image::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');
    }

    public function add_cellsImage(Request $request)
    {
        $request->validate(
            [
                 'filename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
                 'image_title'    =>           'required|unique:cell_multiple_images'
            ]
        );
        $data= new cell_multiple_image();
        $data->image_title= $request->image_title;
        $data->image_alt= $request->image_alt;
        $data->sort_order= $request->order;
        $data->event= $request->event;
        $data->parent_id=$request->parent_id;
        $data->status= $request->status;
        $path=public_path('uploads/multiple/club');
        if($request->hasFile('filename')){
            $file=$request->file('filename');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image= $newname;
        }
        $data->save();
        return back()->with('success','Record save Successfully');
      }


    public function View_cellsImage($id)
    {
    $data=cell_multiple_image::whereparent_id(dDecrypt($id))->get();
     $id=dDecrypt($id);
    return view('admin.sections.managecellsimages',['data'=>$data,'id'=>$id]);
    }


    public function Edit_cellsImage(Request $request)
    {
       $request->validate(
          [

             //'filename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
             //'image_text'         =>       'required'

          ]
         );
         $data=cell_multiple_image::find($request->id);
         $data->image_title=$request->image_text;
         $data->image_alt=$request->image_alt;
         $data->sort_order=$request->order;
         $data->status=$request->status;
         $data->event= $request->event;
         $data->parent_id=$request->parent_id;


        $path=public_path('uploads/multiple/club');
        if($request->hasFile('filename')){
            $file=$request->file('filename');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image= $newname;

        }

        $data->save();
      return back()->with('success','Record Edit Successfully');
    }





//ajax
public function event_activity_show(){

    $data=Events::get();
    return response()->json(['data'=>$data]);
}

public function student_list()
{
 $data=student_council::get();
 return response()->json($data, 200);
}

public function journal_id(Request $request)
  {
      $show=journal_publication_child::find($request->id);
      $item=journal_publication_child::whereid($show->id)->first();
      return response()->json(['item'=>$item]);
  }

  public function journal_publications_list()
  {
      $item=journal_publication::get();
      return response()->json(['item'=>$item]);
  }

  public function Wellness_Facilities_id(Request $request)
  {

      $item=wellness_facilitie::get();
      return response()->json(['item'=>$item]);
  }

     public function cells_list()
    {
        $data=\App\Models\commmittee::get();
        return response()->json($data);
    }


//committee
public function add_Edit_Committee(Request $request,$id=NULL)
{
    $profile=OrganisationStructure::get();
    if($id){
        $title="Edit Commmittee Details";
        $msg="Commmittee Details Edited Successfully!";
        $data=commmittee::find(dDecrypt($id));
    }
    else{

          $title="Add Commmittee Details";
          $msg="Commmittee Details Added Successfully!";
          $data=new commmittee;
        //  dd($request->all());
    }

        if($request->isMethod('post')){
            if($id){
            $request->validate([

                'title'         =>'required',
                'Commmittee_logo'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'Commmittee_image'  =>   'image|mimes:jpeg,png,jpg,gif|max:2048',
                'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

            ]);
            }
            else{
                $request->validate([

                    'title'=>'required|unique:commmittees',
                    'Commmittee_logo'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'Commmittee_image'  =>   'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

            ]);
        }

        $data->title=$request->title;
        $data->chairperson= $request->chairperson;
        $data->type= $request->type;
        $data->about_details=$request->about_details;
        $data->activites= $request->activeites;
        $data->placement= $request->Placement;
        $data->event= $request->event;
        $data->status= $request->status;
        $data->logo_title= $request->Committee_logo_title;
        $data->logo_alt= $request->Committee_logo_alt;
        $data->image_title= $request->Committee_image_title;
        $data->image_alt= $request->Committee_image_alt;
        $data->slug=SlugCheck('commmittees',($request->title));
        $data->banner_title= $request->banner_title;
        $data->banner_alt= $request->banner_alt;

        $path=public_path('uploads/club');
        if($request->hasFile('Commmittee_logo')){
            $file=$request->file('Commmittee_logo');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->logo= $newname;
        }

        $path=public_path('uploads/club');
        if($request->hasFile('Commmittee_image')){
            $file=$request->file('Commmittee_image');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image= $newname;
        }


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
       return redirect('Accounts/manage-committee')->with('success',$msg);
    }
    return view('admin.sections.add_committee',compact('data','title','id','profile'));
    }

    function Delete_Committee($id){

        $exit = commmittee::where('id',dDecrypt($id))->first();
        if(!empty($exit)){
            commmittee::find(dDecrypt($id))->delete();
        }else{
            return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
        }
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    public function view_Committee(){
       $data=commmittee:: orderBy('id')->get();
     return view('admin.sections.manageCommittee',['data'=>$data]);

   }


   public function Show_Committee($id){
    $data=commmittee::find(dDecrypt($id))->first();
    $data=commmittee::where('id',$data->id)->first();
    $profile=OrganisationStructure::get();
    return view('admin.sections.view_committee',['data'=>$data,'profile'=>$profile]);
}



//committee image

        public function delete_committeeImage($id){

        $exit = committee_multiple_image::where('id',dDecrypt($id))->first();
        if(!empty($exit)){
            committee_multiple_image::find(dDecrypt($id))->delete();
        }else{
            return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
        }
        return redirect()->back()->with('success','Record Deleted Successfully');

        }


        public function add_CommitteeImage(Request $request){

            $request->validate(

                [
                     'filename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
                     'committee_title'   =>       'required|unique:committee_multiple_images'
                ]


            );
          //data in database
          $data= new committee_multiple_image();
          $data->committee_title= $request->committee_title;
          $data->committee_alt= $request->committee_alt;
          $data->sort_order= $request->order;
          $data->event= $request->event;
          $data->parent_id=$request->parent_id;
          $data->status= $request->status;
          $path=public_path('uploads/multiple/club');
          if($request->hasFile('filename')){
              $file=$request->file('filename');
              $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
              $file->move($path, $newname);
              $data->image= $newname;
          }
          $data->save();
          return back()->with('success','Record save Successfully');

        }

        public function View_committeeImage($id)
        {
            $data=committee_multiple_image::whereparent_id(dDecrypt($id))->get();
            $id=dDecrypt($id);
            return view('admin.sections.manageCommitteeimage',['data'=>$data,'id'=>$id]);
        }


        public function edit_committeeImage(Request $request)
        {
           //dd($request->all());
           $request->validate(
              [
                  'filename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
                  'committee_title'   =>       'required'
              ]
             );
             $data=committee_multiple_image::find($request->id);
             $data->committee_title= $request->committee_title;
             $data->committee_alt=$request->image_alt;
             $data->sort_order=$request->order;
             $data->status=$request->status;
             $data->event= $request->event;
             $data->parent_id=$request->parent_id;
            $path=public_path('uploads/multiple/club');
            if($request->hasFile('filename')){
                $file=$request->file('filename');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image = $newname;

            }

            $data->save();
          return back()->with('success','Record Edit Successfully');
        }

// club
public function add_Edit_club(Request $request,$id=NULL){
    $profile=OrganisationStructure::get();
    if($id){
        $title="Edit club Details";
        $msg="club Details Edited Successfully!";
        $data=club::find(dDecrypt($id));
    }
    else{

          $title="Add club Details";
          $msg="club Details Added Successfully!";
          $data=new club;
        //  dd($request->all());
    }



        if($request->isMethod('post')){
            if($id){
            $request->validate([

                 'title'               =>      'required',
                'club_logo'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
                'club_image'       =>        'image|mimes:jpeg,png,jpg,gif|max:2048',
                'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

            ]);
            }
            else{
                $request->validate([

                   'title'          =>           'required|unique:clubs',
                    'club_logo'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'club_image'       =>        'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'bannerimage'=>'max:5120|mimes:png,jpg|dimensions:max_width=1920,min_width=1920,max_height=500,min_height=500',

            ]);
        }

        $data->title=$request->title;
        $data->about_details= $request->about_details;
        $data->activitie= $request->activitie;
        $data->chairperson= $request->chairperson;
        $data->slug=SlugCheck('clubs',($request->title));
        $data->status= $request->status;
        $data->event= $request->event;
        $data->type=$request->club_type;
        $data->logo_title= $request->club_logo_title;
        $data->logo_alt= $request->club_logo_alt;
        $data->image_title	= $request->club_image_title	;
        $data->image_alt= $request->club_image_alt;

        $path=public_path('uploads/club');
        if($request->hasFile('club_logo')){
            $file=$request->file('club_logo');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->logo= $newname;
        }
        $path=public_path('uploads/club');
        if($request->hasFile('club_image')){
            $file=$request->file('club_image');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image= $newname;
        }


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
       return redirect('Accounts/manage-clubs')->with('success',$msg);
    }

    return view('admin.sections.add_club',compact('data','title','id','profile'));
}

public function view_club(){
    $data=club:: orderBy('id')->get();
    return view('admin.sections.manageclub',['data'=>$data]);
}




public function Show_Club($id){
    $data=club::find(dDecrypt($id))->first();
    $data=club::where('id',$data->id)->first();
    $profile=OrganisationStructure::get();
    return view('admin.sections.view_club',['data'=>$data,'profile'=>$profile]);
}



function Delete_Club($id){

    $exit = club::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        club::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');
}



//club images
public function Delete_clubImage($id){

    $exit = club_multiple_image::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        club_multiple_image::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');

    }

    public function add_ClubImage(Request $request){

       // dd($request->all());

        $request->validate(

            [
                 'filename' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                 'image_title' => 'required|unique:club_multiple_images'
            ]
        );


      //data in database
      $data= new club_multiple_image();
      $data->image_title= $request->image_title;
      $data->image_alt= $request->image_alt;
      $data->sort_order= $request->order;
      $data->event= $request->event;
      $data->parent_id=$request->parent_id;
      $data->status= $request->status;
      $path=public_path('uploads/multiple/club');
      if($request->hasFile('filename')){
          $file=$request->file('filename');
          $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
          $file->move($path, $newname);
          $data->image	= $newname;
      }
      $data->save();
      return back()->with('success','Record save Successfully');

    }

    public function View_clubImage($id)
    {
        $data=club_multiple_image::whereparent_id(dDecrypt($id))->get();
        $id=dDecrypt($id);
    return view('admin.sections.manageclubimage',['data'=>$data,'id'=>$id]);
    }
    public function edit_clubImage(Request $request)
    {
      //  dd($request->all());
       $request->validate(
          [

              'filename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
              'image_title'        =>       'required'

          ]
         );
         $data=club_multiple_image::find($request->id);
         $data->image_title=$request->image_title;
         $data->image_alt=$request->image_alt;
         $data->sort_order=$request->order;
         $data->status=$request->status;
         $data->parent_id=$request->parent_id;
         $data->event= $request->event;
        $path=public_path('uploads/multiple/club');
        if($request->hasFile('filename')){
            $file=$request->file('filename');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image = $newname;
        }
        $data->save();
      return back()->with('success','Record Edit Successfully');
    }

        public function club_id_image(Request $request)
        {

            $show=club_multiple_image::find($request->id);

            $item=club_multiple_image::whereid($show->id)->first();

            return response()->json(['item'=>$item]);

        }

        public function gallery_id_image(Request $request)
        {
            $show=cell_multiple_image::find($request->id);
            $item=cell_multiple_image::whereid($show->id)->first();
            return response()->json(['item'=>$item]);
        }

        public function committee_id_image(Request $request)
        {
            $show=committee_multiple_image::find($request->id);
            $item=committee_multiple_image::whereid($show->id)->first();
            return response()->json(['item'=>$item]);
        }



public function View_scstobc(){
    $data=scstobc_forms::get();
    return view('admin.sections.sc-st-obc-listing',['data'=>$data]);
}


public function fileExportMDP(){
   return  Excel::download(new Exportguidelinesparticipant, 'ExportMDP.php.xlsx');
}


}
//end

