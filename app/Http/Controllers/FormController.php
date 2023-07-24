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
use App\Models\feedback;
use App\Models\committee_multiple_image;
use App\Models\club_multiple_image;
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

    //Sanchit Code Starts
    public function viewtenders()
        {
            $tender=Tender::orderBy('id')->get();
            return view('admin.sections.tendersadd',['tender'=>$tender]);
        }

        public function add_tender(Request $request,$id=null)
        {

    if($id){
        $title="Edit Tender Details";
        $msg="Tender Details Edited Successfully!";
        $tender=Tender::find(dDecrypt($id));


    }
    else{

          $title="Add Tender Details";
          $msg="Tender Details Added Successfully!";
          $tender=new Tender;
        //  dd($request->all());
    }

    if($request->isMethod('post')){
        $request->validate([

        ]);

            $tender->published_date=$request->published_date;
            $tender->submission_date=$request->submission_date;
            $tender->title=$request->title;


            if($request->hasFile('tender_document')){
                $tender->pdfsize=$request->tender_document->getSize();
                $file=$request->file('tender_document');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=public_path('uploads/tenders');
                $file->move($path,$newname);
            $tender->tender_document=$newname;
            }
            $tender->corrigendum=$request->corrigendum;
            $tender->status=$request->status;
            $tender->save();
        return redirect()->route('admin.viewtenders')->with('success',$msg);
    }
    return view('admin.sections.tendors',compact('tender','title','id'));
    }

    public function delete_tender($id){
        Tender::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Tender deleted Successfully');
    }

    public function vendordebarred()
        {
            $vendordebarred=Vendorsdebarred::orderBy('id')->get();
            return view('admin.sections.vendorsdebarredmanage',['vendordebarred'=>$vendordebarred]);
        }

        public function vendoradd(Request $request,$id=null)
        {

    if($id){
        $title="Edit Details";
        $msg="Tender Details Edited Successfully!";
        $vendorsdebarred=Vendorsdebarred::find(dDecrypt($id));


    }
    else{

          $title="Add Details";
          $msg="Details Added Successfully!";
          $vendorsdebarred=new Vendorsdebarred;
        //  dd($request->all());
    }

    if($request->isMethod('post')){
        $request->validate([
            ]);

            $vendorsdebarred->vendor_name=$request->vendor_name;

            if($request->hasFile('related_document')){
                $vendorsdebarred->pdfsize=$request->related_document->getSize();
                $file=$request->file('related_document');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=public_path('uploads/vendorsdebarred');
                $file->move($path,$newname);
            $vendorsdebarred->related_document=$newname;
            }
            $vendorsdebarred->status=$request->status;
            $vendorsdebarred->save();

        return redirect()->route('admin.vendordebarred')->with('success',$msg);
    }
    return view('admin.sections.editvendor',compact('vendorsdebarred','title','id'));
    }

    public function delete_vendor($id){
        Vendorsdebarred::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Debarred deleted Successfully');
    }

    public function careershow()
        {
            $career=Career::orderBy('id')->get();
            return view('admin.sections.managecareer',['career'=>$career]);
        }

        public function add_career(Request $request,$id=null)
        {


    if($id){


        $title="Edit Details";
        $msg="Details Edited Successfully!";
        $career=Career::find(dDecrypt($id));


    }
    else{

          $title="Add Details";
          $msg="Details Added Successfully!";
          $career=new Career;

    }

    if($request->isMethod('post')){
        $request->validate([
            ]);

            $career->name_of_the_post=$request->name_of_the_post;

            if($request->hasFile('detail_advertisement')){
                $career->pdfsize=$request->detail_advertisement->getSize();
                $file=$request->file('detail_advertisement');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=public_path('uploads/fo');
                $file->move($path,$newname);
            $career->detail_advertisement=$newname;
            }
            $career->note=$request->note;
            $career->opening_date=$request->opening_date;
            $career->closing_date=$request->closing_date;
            $career->online_link=$request->online_link;
            $career->corrigendum=$request->corrigendum;
            $career->status=$request->status;
            $career->save();

        return redirect()->route('admin.careershow')->with('success',$msg);
    }

    return view('admin.sections.careers',compact('career','title','id'));
    }

    public function delete_career($id){
        Career::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Debarred deleted Successfully');
    }
    //Sanchit Code Ends

    function View_OrganisationStructure(Request $request){
        if(!empty($request->dp))$data=OrganisationStructure::where('organisation_structures.department',$request->dp)->orderby('id','Desc')->paginate(10);
        else $data=OrganisationStructure::orderby('id','Desc')->paginate(10);

        $departments=['0'=>'Filter Department','1'=>'Director','2'=>'Chairperson','3'=>'Members','4'=>'Secretary to the Board','6'=>'Faculty Directory','7'=>'Visiting Faculty','8'=>'International Relations Chairperson','9'=>'International Relations SENIOR MEMBERS'];

        $data->appends(['dp' => $request->dp]);


        return view('admin.sections.OrganisationStructure',compact('data','departments'));
    }

    function Delete_OrganisationStructure($id){
        $data=OrganisationStructure::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }
function Add_OrganisationStructure(Request $request,$id=null){
 $data1=cell::get();
        $data2=commmittee::get();
        $data3=club::get();

        if($id){
            $title="Edit Organisation Structure";
            $msg="Organisation Structure Edited Successfully!";
            $data=OrganisationStructure::find(dDecrypt($id));

            $faculty_dept= FacultyDepartment::where('faculty_id',$data->id)->first();
            if($faculty_dept)
            {
                $faculty_dept= FacultyDepartment::where('faculty_id',$data->id)->first();
            }
            else
            {
                $faculty_dept=new FacultyDepartment;
            }
           // dd("$faculty_dept");

        }
        else{
             $title="Add Organisation Structure";
            $msg="Organisation Structure Added Successfully!";
           // dd($request);
            $data=new OrganisationStructure;

              $faculty_dept=new FacultyDepartment;
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
            $data->more_designation=$request->more_designation;
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
            $data-> linkedIn_title= $request->linkedIn_title;
            $data->orcid= $request->orcid;
            $data->orcid_title=$request->orcid_title;
            $data->webofscience=$request->webofscience;
            $data->webofscience_title=$request->webofscience_title;
            $data->scopus= $request->scopus;
            $data-> scopus_title= $request->scopus_title;
            $data->scholar= $request->scholar;
            $data->scholar_title= $request->scholar_title;
            $data->wellness_cootdiantors= $request->wellness_cootdiantors;
            $data->faculty_id= $request->faculty_dept_id;
            $data->Club= $request->Club;
            $data->Committee= $request->Committee;
            $data->Cell= $request->Cell;
            $data->more_designation_h = $request->more_designation_h;
            $data->media_coordinators= $request->media_coordinators;


            $path=public_path('uploads/organisation');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }

            $data->save();


            $faculty_dept->faculty_id=$data->id;
            $faculty_dept->faculty_dept_id=$request->faculty_dept_id;
            $faculty_dept->save();
            return redirect()->route('admin.people')->with('success',$msg);
        }

        $departments=Department::all();

        //return $departments;
        return view('admin.sections.addOrganisationStructure',compact('data','title','id','departments','data1','data2','data3'));
    }

//    function Add_OrganisationStructure(Request $request,$id=null){
//
//        if($id){
//            $title="Edit Organisation Structure";
//            $msg="Organisation Structure Edited Successfully!";
//            $data=OrganisationStructure::find(dDecrypt($id));
//        }
//        else{
//             $title="Add Organisation Structure";
//            $msg="Organisation Structure Added Successfully!";
//           // dd($request);
//            $data=new OrganisationStructure;
//        }
//
//        if($request->isMethod('post')){
//            $request->validate([
//                'title'=>'required',
//                'type'=>'required',
//                'phone'=>'required',
//                'email'=>'required',
//            ]);
//            $data->type=$request->type;
//            $data->title=ucwords($request->title);
//            $data->title_h=$request->title_h;
//            $data->description= $request->description;
//            $data->description_h= $request->description_h;
//            $data->department= $request->department;
//            $data->department_h= $request->department_h;
//            $data->email=$request->email;
//            $data->phone=$request->phone;
//            $data->extension=$request->extension;
//            $data->designation= $request->designation;
//            $data->designation_h= $request->designation_h;
//
////social mediea links
//            $data->slug=SlugCheck('organisation_structures',($request->title));
//            $data->status= $request->status;
//            $data->instagram= $request->instagram;
//            $data->Instagram_title= $request->Instagram_title;
//            $data->Facebook= $request->Facebook;
//            $data->Facebook_title=$request->Facebook_title;
//            $data->twitter=$request->twitter;
//            $data->Twitter_title=$request->Twitter_title;
//            $data->linkedin= $request->linkedin;
//            $data->	linkedIn_title= $request->linkedIn_title;
//            $data->orcid= $request->orcid;
//            $data->orcid_title=$request->orcid_title;
//            $data->webofscience=$request->webofscience;
//            $data->webofscience_title=$request->webofscience_title;
//            $data->scopus= $request->scopus;
//            $data->	scopus_title= $request->scopus_title;
//            $data->scholar= $request->scholar;
//            $data->scholar_title= $request->scholar_title;
//
//            $path=public_path('uploads/organisation');
//            if($request->hasFile('image')){
//                $file=$request->file('image');
//                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
//                $file->move($path, $newname);
//                $data->image= $newname;
//            }
//
//            $data->save();
//            return redirect()->route('admin.people')->with('success',$msg);
//        }
//
//        return view('admin.sections.addOrganisationStructure',compact('data','title','id'));
//    }

    public function Delete_biography($id)
    {
       $data= multiple_profile::find(dDecrypt($id))->delete();
       return back();
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

             if(str_contains($value->getActionname(), 'App\Http\Controllers\AdminController') || str_contains($value->getActionname(), 'App\Http\Controllers\FormController')  || str_contains($value->getActionname(), 'App\Http\Controllers\blogcontroller')  || str_contains($value->getActionname(), 'App\Http\Controllers\gallaycontroller') || str_contains($value->getActionname(), 'App\Http\Controllers\pagecontroller') || str_contains($value->getActionname(), 'App\Http\Controllers\quicklinkcontrller')  || str_contains($value->getActionname(), 'App\Http\Controllers\vidoecontroller') || str_contains($value->getActionname(), 'App\Http\Controllers\UIController')){

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

    $data=\App\Models\multiple_profile::where('parent_id','=',dDecrypt($id))->get();
    return view('admin.sections.manage_profile_details',['data'=>$data]);
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
        $request->validate([

        ]);

       // dd($request->all());
        $data->Title=$request->Title;
        $data->title_h=$request->title_h;
        // $data->Image=$request->Image;
        $data->heading=$request->heading;
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

//cell
public function add_cells(Request $request,$id=null){
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
        $request->validate([

        ]);
        $data->title=$request->Cell_name;
        $data->chairperson= $request->chairperson;
        $data->about_details= $request->about_details;
        $data->activites= $request->activites;
        $data->status= $request->status;
        $data->event= $request->event;
        $data->slug=SlugCheck('cells',($request->Cell_name));
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

public function view_cells(){
    $data=cell:: orderBy('id')->get();
    return view('admin.sections.managecells',['data'=>$data]);
}



function delete_cells($id){
    cell::find(dDecrypt($id))->delete();
    return redirect()->back()->with('success','cell deleted Successfully');
}





public function add_club(Request $request,$id=NULL){
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
        $request->validate([

        ]);
        $data->title=$request->club_name;
        $data->about_details= $request->about_details;
        $data->activitie= $request->activitie;
        $data->chairperson= $request->chairperson;
        $data->slug=SlugCheck('clubs',($request->club_name));
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

function delete_club($id){
    club::find(dDecrypt($id))->delete();
    return redirect()->back()->with('success','Club deleted Successfully');
}

//committee
public function add_committee(Request $request,$id=NULL)
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
        $request->validate([

        ]);
        $data->title=$request->Commmittee_name;
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
        $data->slug=SlugCheck('commmittees',($request->Commmittee_name));
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

    function delete_committee($id){
        commmittee::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','committee deleted Successfully');
    }

    public function view_committee(){
    $data=commmittee:: orderBy('id')->get();
   return view('admin.sections.manageCommittee',['data'=>$data]);

}
     public function cells_list()
    {
        $data=\App\Models\commmittee::get();
        return response()->json($data);
    }

//cells images
public function delete_cells_image($id){
            cell_multiple_image::find(dDecrypt($id))->delete();
            return redirect()->back()->with('success','committee deleted Successfully');
         }

        public function add_cells_image(Request $request)
        {

            $request->validate(

                [

                ]


            );
            $data= new cell_multiple_image();
            $data->image_title= $request->image_text;
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


        public function cells_image($id)
        {
        $data=cell_multiple_image::whereparent_id(dDecrypt($id))->get();
         $id=dDecrypt($id);
        return view('admin.sections.managecellsimages',['data'=>$data,'id'=>$id]);
        }

// club image

        public function delete_club_image($id){
            club_multiple_image::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Club deleted Successfully');
        }

        public function add_club_image(Request $request){

            $request->validate(

                [

                ]


            );
          //data in database
          $data= new club_multiple_image();
          $data->image_title= $request->image_text;
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

        public function club_image($id)
        {
            $data=club_multiple_image::whereparent_id(dDecrypt($id))->get();
            $id=dDecrypt($id);
        return view('admin.sections.manageclubimage',['data'=>$data,'id'=>$id]);
        }

//committee image

        public function delete_committee_image($id){
          $data=committee_multiple_image::find(dDecrypt($id));
          $data->delete();
        return redirect()->back()->with('success','committee deleted Successfully');
        }


        public function add_Committee_image(Request $request){

            $request->validate(

                [

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

        public function committee_image($id)
        {
            $data=committee_multiple_image::whereparent_id(dDecrypt($id))->get();
            $id=dDecrypt($id);
            return view('admin.sections.manageCommitteeimage',['data'=>$data,'id'=>$id]);
        }


    //code 3 july

        public function gallery_id_image(Request $request)
        {
            $show=cell_multiple_image::find($request->id);
            $item=cell_multiple_image::whereid($show->id)->first();
            return response()->json(['item'=>$item]);
        }

        public function edit_cells_image(Request $request)
        {
           $request->validate(
              [



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




        public function club_id_image(Request $request)
        {

            $show=club_multiple_image::find($request->id);

            $item=club_multiple_image::whereid($show->id)->first();

            return response()->json(['item'=>$item]);

        }


        public function edit_club_image(Request $request)
        {
          //  dd($request->all());
           $request->validate(
              [



              ]
             );
             $data=club_multiple_image::find($request->id);
             $data->image_title=$request->image_text;
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


        public function committee_id_image(Request $request)
        {
            $show=committee_multiple_image::find($request->id);
            $item=committee_multiple_image::whereid($show->id)->first();
            return response()->json(['item'=>$item]);
        }

        public function edit_committee_image(Request $request)
        {
          //  dd($request->all());
           $request->validate(
              [



              ]
             );
             $data=committee_multiple_image::find($request->id);
             $data->committee_title=$request->image_text;
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

        //Code by Sanchit starts
        public function add_title(Request $request,$id=NULL){
    if($id){
        $title="Edit title Details";
        $msg="title Details Edited Successfully!";
        $data=Events::find(dDecrypt($id));
    }
    else{

          $title="Add title Details";
          $msg="title Details Added Successfully!";
          $data=new Events;
        //  dd($request->all());
    }

    if($request->isMethod('post')){
        $request->validate([

        ]);
        $data->title=$request->title;
        $data->status= $request->status;
        $data->save();
       // dd($request->all());
       return redirect()->route('admin.title')->with('success',$msg);
    }

    return view('admin.sections.events&activities',compact('data','title','id'));
    }
    public function title(){
    $data=Events:: orderBy('id')->get();
    return view('admin.sections.manageevents&activities',['data'=>$data]);
    }

    public function delete_title($id){
    Events::find(dDecrypt($id))->delete();
    return redirect()->back()->with('success','Club deleted Successfully');
    }

    public function delete_image($id){
        event_image::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Club deleted Successfully');
        }

     public function add_image(Request $request,$id=NULL){
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
        $request->validate([
            ]);

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

        return redirect()->route('admin.title')->with('success',$msg);
    }

    return view('admin.sections.event&activitiesimage',compact('event','title','id','data'));
    }

    public function eventactivities($id)
    {
    $data=event_image::orderBy('id')->where('parent_id',$id)->get();
    return view('admin.sections.event&activitiesimageview',['data'=>$data]);
    }

   public function delete_industry($id){
        Industry::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Club deleted Successfully');
        }

     public function add_industry(Request $request,$id=NULL){
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
        $request->validate([
            ]);

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

    public function industry()
    {
    $data=Industry::orderBy('id')->get();
    return view('admin.sections.viewindustry',['data'=>$data]);
    }
    public function event_activity_show(){

    $data=Events::get();
    return response()->json(['data'=>$data]);

}
//add student council
public function student_council_index()
{
    $data=\App\Models\student_council::get();
    return view('admin.sections.manage_student_council',['data'=>$data]);
}

public function Add_student_council(Request $request,$id=null)
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
        $request->validate([

        ]);
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

    public function Delete_studentcouncil($id){
    $data=student_council::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','committee deleted Successfully');
  }

  public function student_list()
  {
   $data=student_council::get();
   return response()->json($data, 200);
  }

//journal_publications
public function journal_publications_index()
{
    $data=\App\Models\journal_publication::get();
    return view('admin.sections.managejournalpublications',['data'=>$data]);
}

public function Add_journal_publications(Request $request,$id=null)
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
        $request->validate([

        ]);
        $data->title=$request->title;
        $data->external=$request->external;
        $data->url=$request->url1;
        $data->year=$request->year;
        $data->status=$request->status;



        $data->save();
        return redirect('/Accounts/journal-publications')->with('success',$msg);

    }

    return view('admin.sections.add_journal_publications',compact('data','title','id'));

}

    public function Delete_journal_publications($id){
    $data=journal_publication::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','journal publications deleted Successfully');
  }


  //journal publications page
public function journal_publications_page_index($id)
{
    $id=$id;
    $data=\App\Models\journal_publication_child::where('parent_id',dDecrypt($id))->get();
    return view('admin.sections.journal_publications_page',['data'=>$data,'id'=>$id]);
}

public function Add_journal_publications_page(Request $request,$id=null)
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
        $request->validate([

        ]);
        $data->url=$request->url;
        $data->about_details=$request->about_details;
        $data->status=$request->status;
        $data->parent_id=dDecrypt($request->parent_id);
        $data->save();
        return back()->with('success',$msg);
    }
    return view('admin.sections.add_journal_publications_page',compact('data','title','id'));

}

    public function Delete_journal_publications_page($id){
    $data=journal_publication_child::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','journal publications deleted Successfully');
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


  //add-edit-ANTI-RAGGING
  public function ANTI_RAGGING_index()
{
    $data=\App\Models\anti_raggings::get();
    return view('admin.sections.mange_ANTI_RAGGING',['data'=>$data]);
}

public function add_ANTI_RAGGING(Request $request,$id=null)
{

    if($id){
        $title="Edit Anti Ragging Section";
        $msg="Anti Ragging Edited Successfully!";
        $data=anti_raggings::find(dDecrypt($id));
    }
    else{
        $title="Add Anti Ragging Section";
        $msg="Anti Ragging Added Successfully!";
        $data=new anti_raggings;

        //child journal_publication_child
    }

    if($request->isMethod('post')){
        $request->validate([

        ]);

        $data->status=$request->status;

        $path=public_path('uploads/pdf');
        if($request->hasFile('pdf')){
            $data->pdfsize=$request->pdf->getSize();
            $file=$request->file('pdf');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf= $newname;
        }
        $data->save();
        return redirect('/Accounts/ANTI-RAGGING')->with('success',$msg);
    }
    return view('admin.sections.add_ANTI_RAGGING',compact('data','title','id'));

}

    public function delete_ANTI_RAGGING($id){
    $data=anti_raggings::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','Anti Ragging deleted Successfully');
  }


//Wellness-Facilities
public function Wellness_Facilities_Index()
{
    $data=\App\Models\wellness_facilitie::get();
    return view('admin.sections.manage_WellnessFacilities',['data'=>$data]);
}

public function add_Wellness_Facilities(Request $request,$id=null)
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
        $request->validate([

        ]);
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

    public function delete_Wellness_Facilities($id){
    $data=wellness_facilitie::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','journal publications deleted Successfully');
  }


 //wellness_facilitie_image
 public function Wellness_index($id)
  {
     $data=wellness_facilitie_image::whereparent_id(dDecrypt($id))->get();
     $id=dDecrypt($id);
    return view('admin.sections.manage_Wellness_image',['data'=>$data,'id'=>$id]);
  }

  public function delete_Wellness_index($id){
    $data=wellness_facilitie_image::find(dDecrypt($id));
    $data->delete();
  return redirect()->back()->with('success','committee deleted Successfully');
  }


  public function add_Wellness_image(Request $request){

      $request->validate(

          [

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

  public function edit_Wellness_image(Request $request,$id)
  {
     $request->validate(
        [



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

  public function Wellness_Facilities_id(Request $request)
  {

      $item=wellness_facilitie::get();
      return response()->json(['item'=>$item]);
  }


  //Rit

public function view_rti(){
$data=rti:: orderBy('id')->get();
return view('admin.sections.manage_RTI',['data'=>$data]);

}

public function add_RTI(Request $request,$id=NULL)
{

    if($id){
        $title="Edit Rti Details";
        $msg="Rti Details Edited Successfully!";
        $data=rti::find(dDecrypt($id));
    }
    else{

          $title="Add Rti Details";
          $msg="Rti Details Added Successfully!";
          $data=new rti;
    }

    if($request->isMethod('post')){
        $request->validate([

        ]);

        $data->title=$request->title;
        $data->CPIO=$request->CPIO;
        $data->Authority=$request->Authority;
        $data->status=$request->status;
        $path=public_path('uploads/rti');
        if($request->hasFile('pdf')){
            $data->pdfsize=$request->pdf->getSize();
            $file=$request->file('pdf');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf= $newname;
        }
        $data->save();
       return redirect('Accounts/RTI')->with('success',$msg);
    }
    return view('admin.sections.add_RTI',compact('data','title','id'));
    }

    function delete_RTI($id){
        rti::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','committee deleted Successfully');
    }

    public function view_rti_section()
    {

    $data=rit_report_section::get();
    return view ('admin.sections.manage_rti_section',['data'=>$data]);
    }

    public function add_rit_pdf(Request $request)
    {

        $request->validate(
            [



            ]
           );
        $data=New rit_report_section;
        $data->title= $request->text;
        $data->Quarterly_section= $request->Quarterly_section;
        $data->Quarterly_type= $request->Quarterly_type;
        $data->status= $request->status;

        $path=public_path('uploads/rti/');
        if($request->hasFile('filename')){
            $data->pdfsize=$request->filename->getSize();
            $file=$request->file('filename');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf= $newname;
        }
        $data->save();
        return back()->with('success','Record Edit Successfully');

    }



    public function edit_rti_section(Request $request,$id)
    {


        $request->validate(
            [



            ]
           );
        $data=rit_report_section::find($id);
        $data->title= $request->text;
        $data->Quarterly_section= $request->Quarterly_section;
        $data->Quarterly_type= $request->Quarterly_type;
        $data->status= $request->status;

        $path=public_path('uploads/rti/');
        if($request->hasFile('filename')){
            $data->pdfsize=$request->filename->getSize();
            $file=$request->file('filename');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf= $newname;
        }
        $data->save();
        return back()->with('success','Record Edit Successfully');

    }

    public function delete_rti_section($id)
    {
        rit_report_section::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','committee deleted Successfully');
    }

    public function pdf_section(Request $request){
        $item=rit_report_section::whereid($request->id)->first();
        return response()->json(['item'=>$item]);
    }
    //QUARTER section
    public function view_rti_QUARTER()
    {
    $data=quarter_report::get();
    return view ('admin.sections.manageQuarterly',['data'=>$data]);
    }

    public function add_rit_QUARTER(Request $request)
    {

        $request->validate(
            [



            ]
           );
        $data=New quarter_report;

        $data->status= $request->status;
        $data->year= $request->year;

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf1')){
            $data->pdfsize_first=$request->QUARTER_pdf1->getSize();
            $file=$request->file('QUARTER_pdf1');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_first= $newname;
        }

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf2')){
            $data->pdfsize_second=$request->QUARTER_pdf2->getSize();
            $file=$request->file('QUARTER_pdf2');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_second= $newname;
        }

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf3')){
            $data->pdfsize_third=$request->QUARTER_pdf3->getSize();
            $file=$request->file('QUARTER_pdf3');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_third= $newname;
        }

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf4')){
            $data->pdfsize_fourth=$request->QUARTER_pdf4->getSize();
            $file=$request->file('QUARTER_pdf4');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_fourth = $newname;
        }
        $data->save();
        return back()->with('success','Record Edit Successfully');

    }

    public function edit_rit_QUARTER(Request $request,$id)
    {


        $request->validate(
            [



            ]
           );
        $data=quarter_report::find($id);
        $data->status= $request->status;
        $data->year= $request->year;

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf1')){
            $data->pdfsize_first=$request->QUARTER_pdf1->getSize();
            $file=$request->file('QUARTER_pdf1');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_first= $newname;
        }

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf2')){
            $data->pdfsize_second=$request->QUARTER_pdf2->getSize();
            $file=$request->file('QUARTER_pdf2');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_second= $newname;
        }

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf3')){
            $data->pdfsize_third=$request->QUARTER_pdf3->getSize();
            $file=$request->file('QUARTER_pdf3');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_third= $newname;
        }

        $path=public_path('uploads/rti/');
        if($request->hasFile('QUARTER_pdf4')){
            $data->pdfsize_fourth=$request->QUARTER_pdf4->getSize();
            $file=$request->file('QUARTER_pdf4');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf_fourth = $newname;
        }

        $data->save();
        return back()->with('success','Record Edit Successfully');

    }

    public function delete_rit_QUARTER($id)
    {
        quarter_report::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','committee deleted Successfully');
    }

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
       $data=feedback::get();
     return view ('admin.sections.manageContactus',['data'=>$data]);
    }

    public function feedback()
    {
      $data=feedback::whereType('feedback')->get();
     return view ('admin.sections.manageFeedback',['data'=>$data]);
    }

}
//end

