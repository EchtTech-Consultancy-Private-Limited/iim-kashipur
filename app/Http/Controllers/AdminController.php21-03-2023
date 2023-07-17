<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\OptionsDump;
use App\Models\FunctionList;
use App\Models\child_menu;
use App\Models\Org;
use App\Models\BannerSlider;
use App\Models\slider_detail;
use App\Models\SiteSetting;
use App\Models\MainMenu;
use App\Models\SubMenu;
use App\Models\SiteLayout;
use App\Models\USP;
use App\Models\QuickLink;
use App\Models\audit_log;
use App\Models\Consultation;
use App\Models\project_logo;
use App\Models\URLList;
use App\Models\quick_linkcategory;
use App\Models\OrganisationStructure;
use DB;
use Hash;
use Spatie\Permission\Models\Role;
use Session;
use App;
use Str;
use Helper;
use Cache;


class AdminController extends Controller
{
    function StatusChange($status,$id,$db){
        DB::table($db)->where('id',dDecrypt($id))->update(['status'=>$status]);
        return redirect()->back()->with('success','Status Changed Successfully');
    }

    function Menu_StatusChange($type,$id,$status){
        if($type=='menu'){
            if($status==0){
                MainMenu::find(dDecrypt($id))->update(['status'=>1]);
            }
            else{
            $data=SubMenu::where('menu_id',dDecrypt($id))->where('status',1)->get();
            if(count($data) > 0){
                return redirect()->back()->with('error','One of the child sub menu is active');
            }
            else{
                MainMenu::find(dDecrypt($id))->update(['status'=>0]);
            }
            }
        } elseif($type=='sub-menu'){
            if($status==0){
            $a=SubMenu::find(dDecrypt($id));
            $a1=MainMenu::find($a->menu_id);
            if($a1->status==0){
                return redirect()->back()->with('error','Main menu must be active');
            }
            else{
            SubMenu::find(dDecrypt($id))->update(['status'=>1]);}
            }
            else{
            SubMenu::find(dDecrypt($id))->update(['status'=>0]);
            }
        } elseif($type=='child-menu'){
            if($status==0){
            $a=child_menu::find(dDecrypt($id));
            $a1=SubMenu::find($a->sub_id);
            if($a1->status==0){
                return redirect()->back()->with('error','Sub menu must be active');
            }
            else{
                child_menu::find(dDecrypt($id))->update(['status'=>1]);}
            }
            else{
                child_menu::find(dDecrypt($id))->update(['status'=>0]);
            }
        }
        return redirect()->back()->with('success','status changed successfully');

    }

    function View_USPs(){
        $data=USP::orderBy('id','DESC')->cursor();
        return view('admin.sections.manage_usps',compact('data'));
    }

    function View_QuickLinks(){
        $data=QuickLink::orderBy('id','DESC')->cursor();
        return view('admin.sections.manage_quicklinks',compact('data'));
    }

    function Add_QuickLink(Request $request,$id=null){

        $data2=URLList::orderBy('type','ASC')->GroupBy('type')->cursor();
        $value=quick_linkcategory::all();
        if($id){
            $title="Edit QuickLink";
            $data=QuickLink::find(dDecrypt($id));
            $msg="QuickLink Edited Successfully";
        }
        else{
            $title="Add QuickLink";
            $data=new QuickLink;
            $msg="QuickLink Added Successfully";
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'title'=>'required',
            ]);
            }
            else{
                 $request->validate([
                'title'=>'required|unique:quick_links',
                'image'=>'required|mimes:jpg,jpeg,gif,png',
            ]);
            }


            $data->title=$request->title;
            $data->url=rtrim($request->url,'/');
            if($request->hasFile('image')){
                $path=public_path('uploads/header_top');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }

            $data->Image_Title=$request->Image_Title;
            $data->Image_Alt=$request->Image_Alt;

            if($request->has('external')){
                $data->external=$request->external;
                $data->url=rtrim($request->url1,'/');
                $data->external= 'yes';
               // dd($request->url1);
                }
                else{
                  //  dd('hii1');
                    $data->url="/".$request->url;
                    $data->external= NULL;

               }

            $data->short=$request->short; //shor note
            $data->link_option=$request->link;
            $data->title_h =$request->title_h;
            $data->short_h=$request->short_h;
            $data->sort_order=$request->sort_order;
            $data->quick_category=$request->urlcategory;
            $data->link_category=$request->urlcategory;
            $data->slug=SlugCheck('quick_links',($request->title));
            $data->Academics=$request->	Academics;
            $data->Footer_info=$request->Footer_info;
            $data->Footer_info2=$request->Footer_info2;
            $data->Category=$request->Category;
            $data->urls=$request->urls;
            $data->photo_url=$request->photo_url;
            $data->video_url=$request->video_url;
            $data->Student_url=$request->Student_url;

           // dd($request->all());
            $data->save();
            return redirect()->route('admin.quicklink')->with('success',$msg);
        }
        return view('admin.sections.add_quicklink',compact('data','id','title','data2','value'));

    }

    function Add_USP(Request $request,$id=null){
          $data1=URLList::orderBy('type','ASC')->groupBy('type')->cursor();
        if($id){
            $title="Edit USP";
            $data=USP::find(dDecrypt($id));
            $msg="USP Edited Successfully";
        }
        else{
            $title="Add USP";
            $data=new USP;
            $msg="USP Added Successfully";
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'name'=>'required',
                'url'=>'required'
            ]);
            }
            else{
                 $request->validate([
                'name'=>'required',
                'url'=>'required',
                'image'=>'required|mimes:jpg,jpeg,gif,png|dimensions:min_height=45,max_height=45,min_width=45,max_width=45',
            ]);
            }
            $data->name=$request->name;
            $data->name_h=$request->name_h;
            $data->url=$request->url;
            if($request->hasFile('image')){
                $path=public_path('uploads/');
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
            }
            $data->save();
            return redirect()->route('admin.usp')->with('success',$msg);
        }
        return view('admin.sections.add_usp',compact('data','id','title','data1'));
    }

    function Delete_USP($id){
        USP::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    function Delete_QuickLink($id){
        QuickLink::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }


    function View_SiteSetting(Request $request){
        $data=SiteSetting::orderBy('id','ASC')->cursor();
        return view('admin.sections.siteSetting',compact('data'));
    }

    function Add_SiteSetting(Request $request,$id=null){
        $f=SiteLayout::where('type','Footer')->orderBy('id','DESC')->cursor();
        $h=SiteLayout::where('type','Header')->orderBy('id','DESC')->cursor();
        $s=SiteLayout::where('type','Slider')->orderBy('id','DESC')->cursor();
        $a=SiteLayout::where('type','About')->orderBy('id','DESC')->cursor();
        $d=SiteLayout::where('type','USP')->orderBy('id','DESC')->cursor();
        $u=SiteLayout::where('type','Upcoming')->orderBy('id','DESC')->cursor();
        $g=SiteLayout::where('type','Gallery')->orderBy('id','DESC')->cursor();
        if($id){
            $title='Edit Site Settings';
            $msg='Records Updated Successfully';
            $data1=SiteSetting::find(dDecrypt($id));
        }
        else{
            $title='Add Site Settings';
            $msg='Records Added Successfully';
            $data1=new SiteSetting;
        }
            if($request->isMethod('post')){
                $request->validate([
                    'page_type'=>'required',
                ]);

                $data1->header= $request->header;
                $data1->footer= $request->footer;
                $data1->section1= $request->section1;
                $data1->section2= $request->section2;
                $data1->section3= $request->section3;
                $data1->section4= $request->section4;
                $data1->section5= $request->section5;
                $data1->section6= $request->section6;
                $data1->page_type= $request->page_type;
                $data1->save();
                return redirect('Accounts/manage-site-setting')->with('success',$msg);
            }
        return view('admin.sections.editsiteSetting',['data'=>$data1,'id'=>$id,'title'=>$title,'footer'=>$f,'header'=>$h,'slider'=>$s,'about'=>$a,'usp'=>$d,'upcom'=>$u,'gall'=>$g]);
    }

    function View_Menus(){
        $data=child_menu::get();
        return view('admin.sections.Menus',['data'=>$data]);
    }

    function Add_Menu(Request $request,$id=null){
      //  dd($request->all());
        $data2=URLList::orderBy('type','ASC')->groupBy('type')->cursor();
        if($id){
            $data=MainMenu::find(dDecrypt($id));
            $title='Edit New Main Menu';
            $msg='Main Menu Edited Successfully ';
        }
        else{
            $data=new MainMenu;

            $title='Add New Main Menu';
            $msg='Main Menu Added Successfully ';
        }
        if($request->isMethod('post')){
            if(!$id){
            $request->validate([
            'name'=>'required|unique:main_menus',
            ]);
            }
             else{
                  $request->validate([
                'name'=>'required',
            ]);
            }


              //$data->name=Str::title($request->name);
              $data->name=$request->name;
              $data->name_h=$request->name_h;
              $data->link_option=$request->sub_id;
              $data->sort_order=$request->sort_order;
              $data->link_type=$request->url;


                if($request->has('external')){
                $data->external=$request->external;
                $data->url=rtrim($request->url1,'/');
                $data->external= 'yes';
               // dd($request->url1);
                }
                else{
                  //  dd('hii1');
                    $data->url="/".$request->url;
                    $data->external= NULL;

               }
              $data->slug=SlugCheck('main_menus',$request->name);

            $data->save();
            return redirect()->route('admin.menusetting')->with('success',$msg);
        }
        return view('admin.sections.addMenus')->with(compact('data','title','id','data2'));
    }

    function Add_SubMenu(Request $request,$id=null){
        $data1=MainMenu::orderBy('name','ASC')->cursor();
        $data2=URLList::orderBy('type','ASC')->groupBy('type')->cursor();
        if($id){
            $data=SubMenu::find(dDecrypt($id));
            $title='Edit New Sub Menu';
            $msg='Sub Menu Edited Successfully ';
        }
        else{
            $data=new SubMenu;
            $title='Add New Sub Menu';
            $msg='Sub Menu Added Successfully ';
        }
        if($request->isMethod('post')){
            if(!$id){
            $request->validate([
                'name'=>'required|unique:sub_menus',

            ]);}
            else{
            $request->validate([
                'name'=>'required',
                'menu_id'=>'required'
            ]);
            }

            //$data->name=Str::title($request->name);
            $data->name=$request->name;
            $data->name_h=$request->name_h;
            $data->menu_id=$request->menu_id;
            $data->sort_order=$request->sort_order;
            $data->tpl_id=$request->tpl_id;

            $data01=MainMenu::find($request->menu_id);

            if($request->has('external')){
                $data->external=$request->external;
                $data->url=rtrim($request->url1,'/');
                $data->external= 'yes';
               // dd($request->url1);
                }
                else{
                  //  dd('hii1');
                    $data->url="/".$request->url;
                    $data->external= NULL;

               }
            $data->slug=SlugCheck('sub_menus',$request->name);
            $data->link_option=$request->sub_id;

          //  dd($request->all());
            $data->save();
            return redirect()->route('admin.menusetting')->with('success',$msg);
        }
        return view('admin.sections.addSubMenus')->with(compact('data1','data2','data','title','id'));
    }

//add child menu
function Add_childMenu(Request $request,$id=null){
    $data1=MainMenu::orderBy('name','ASC')->cursor();
    $data2=URLList::orderBy('type','ASC')->groupBy('type')->cursor();
    if($id){
        $data=child_menu ::find(dDecrypt($id));
        $title='Edit New child Menu';
        $msg='child Menu Edited Successfully ';
    }
    else{
        $data=new child_menu ;
        $title='Add New child Menu';
        $msg='child Menu Added Successfully ';
    }
    if($request->isMethod('post')){
        if(!$id){
        $request->validate([
            'name'=>'required|unique:child_menus',
            'menu_id'=>'required',

          ]);}
        else{
        $request->validate([
            'name'=>'required',
            'menu_id'=>'required',

        ]);
        }

        //$data->name=Str::title($request->name);
        $data->name=$request->name;
        $data->name_h=$request->name_h;
        $data->menu_id=$request->menu_id;
        $data->sub_id=$request->sub_id;
        $data->sort_order=$request->sort_order;

        $data01=MainMenu::find($request->menu_id);
        if($request->has('external')){
            $data->external=$request->external;
            $data->url=rtrim($request->url1,'/');
            $data->external= 'yes';
           // dd($request->url1);
        }
        else{
            //  dd('hii1');
            $data->url="/".$request->url;
            $data->external= NULL;

        }

        $data->slug=SlugCheck('child_menus',$request->name);
        $data->link_option=$request->link_option;
        $data->save();
        return redirect()->route('admin.menusetting')->with('success',$msg);
    }
    return view('admin.sections.addchild_menu')->with(compact('data1','data2','data','title','id'));
   }



        public function submenushow(Request $request){

        $data=SubMenu::where('menu_id','=',$request->id)->get();
        return response()->json(['data'=>$data]);
         }


    function View_Banners(){
        $data=BannerSlider::orderBy('id','ASC')->cursor();
        return view('admin.sections.BannerSlider',compact('data'));
    }

    function Add_Banners(Request $request,$id=null){
        $data2=URLList::orderBy('type','ASC')->groupBy('type')->cursor();
        if($id){
            $title="Edit Banner/Slider";
            $msg="Banner/Slider Edited Successfully!";
            $data=BannerSlider::find(dDecrypt($id));
        }
        else{
             $title="Add Banner/Slider";
            $msg="Banner/Slider Added Successfully!";
            $data=new BannerSlider;
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'title'=>'required',
                'type'=>'required',
            ]);
            }
            else{
                if($request->type=="Banners"){
                $request->validate([
                'title'=>'required|unique:banner_sliders',
                'type'=>'required',
                'image'=>'required|mimes:png,jpg,ico|dimensions:min_height=470,min_width=1920',

            ]);
            }
                else{
                $request->validate([
                'title'=>'required|unique:banner_sliders',
                'type'=>'required',
                'image'=>'required|mimes:png,jpg,ico',
            ]);
                }
            }

            $data->title=ucwords($request->title);
            $data->title_h=$request->title_h;
            $data->type=$request->type;
            $data->short=$request->sort_note;
            $data->short_h=$request->short_h;
            $path=public_path('banner');
            if($request->hasFile('image')){
                $file=$request->file('image');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image= $newname;
                $data->url=('banner/'.$newname);
            }

            $data->linkbutton=$request->buttonlink;
            $data->heading1=$request->heading1;
            $data->heading1_h=$request->heading1_h;
            $data->video_url=$request->video_url;

            $data->banner_Alt=$request->banner_Alt;
            $data->banner_title=$request->banner_title;




            if($request->has('external')){
               // dd($request->all());
                $data->external= $request->external;
                $data->url=rtrim($request->url1,'/');
            }
            else{
                $data->url="/".$request->url;
            }

            $data->save();
            return redirect()->route('admin.banners')->with('success',$msg);
        }
        return view('admin.sections.addBannerSlider',compact('data','data2','title','id'));
    }

         function Delete_Banners($id){
         $data=BannerSlider::find(dDecrypt($id))->delete();
          return redirect()->back()->with('success','Record Deleted Successfully');
    }



    function View_OrganisationDetails(){
        $data=Org::cursor();
        return view('admin.sections.Organisation',compact('data'));
    }

    function Add_OrganisationDetails(Request $request,$id=null){
        if($id){
            $title="Edit Organisation Details";
            $msg="Organisation Details Edited Successfully!";
            $data=Org::find(dDecrypt($id));
        }
        else{
             $title="Add Organisation Details";
            $msg="Organisation Details Added Successfully!";
            $data=new Org;
        }

        if($request->isMethod('post')){
			if($id){
            $request->validate([
                'name'=>'required',
                'contact'=>'required',
                'email'=>'required',
            ]);}
			else{ $request->validate([
                'name'=>'required',
                'logo'=>'required|mimes:png,jpg,ico|dimensions:max_height=130px',
                'fevicon'=>'required|mimes:png,jpg,ico',
                'contact'=>'required',
                'email'=>'required',
                'logo2'=>'mimes:png,jpg,ico|dimensions:max_height=130px',
                'logo3'=>'mimes:png,jpg,ico|dimensions:max_height=130px',
                'logo4'=>'mimes:png,jpg,ico|dimensions:max_height=130px',
                'default_banner_image'=>'required|mimes:png,jpg,svg|dimensions:max_width=1920px, max_height=500px',
            ]);}
            $data->name=ucwords($request->name);
            $data->name_h=$request->name_h;
            $data->about_h=$request->about_h;
            $data->about=$request->about;
            $data->about_title=$request->about_title;
            $data->about_Alt=$request->about_Alt;
            $data->address=ucwords($request->address);
            $data->address_h=$request->address_h;
            $data->email=$request->email;
            $data->contact=$request->contact;
            $data->location=$request->location;
            $data->time=$request->time;

            $data->facebook=$request->facebook;
            $data->Facebook_title=$request->Facebook_title;
            $data->Facebook_Alt=$request->Facebook_Alt;
            $data->url_Facebook=$request->url_Facebook;


            $data->twitter=$request->twitter;
            $data->Twitter_title=$request->Twitter_title;
            $data->Twitter_Alt=$request->Twitter_Alt;
            $data->url_Twitter=$request->url_Twitter;


            $data->instagram=$request->instagram;
            $data->Instagram_title=$request->Instagram_title;
            $data->Instagram_Alt=$request->Instagram_Alt;
            $data->url_Instagram=$request->url_Instagram;




            $data->linkedin=$request->linkedin;
            $data->LinkedIn_title=$request->LinkedIn_title;
            $data->LinkedIn_Alt=$request->LinkedIn_Alt;
            $data->url_LinkedIn=$request->url_LinkedIn;




            $data->youtube=$request->youtube;
            $data->YouTube_title=$request->YouTube_title;
            $data->YouTube_Alt=$request->YouTube_Alt;
            $data->url_YouTube=$request->url_YouTube;



            $data->meta_title= $request->meta_title;
            $data->meta_keywords= $request->meta_keywords;
            $data->meta_description= $request->meta_description;
            $data->head_google_tags= htmlentities($request->HeadGoogleTag);
            $data->body_google_tags= htmlentities($request->BodyGoogleTag);

            $path=public_path('uploads/site-logo/');
            if($request->hasFile('logo')){
                $file=$request->file('logo');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->logo= $newname;
            }

            $data->Logo_Title1=$request->Logo_Title1;
            $data->Logo_Alt1=$request->Logo_Alt1;
            $data->url_logo=$request->url_logo;


            if($request->hasFile('logo2')){
                $file2=$request->file('logo2');
                $newname2= time().rand(10,99).'.'.$file2->getClientOriginalExtension();
                $file2->move($path, $newname2);
                $data->logo2= $newname2;
            }
            $data->url_logo2=$request->url_logo2;
            $data->Logo_Title2=$request->Logo_Title2;
            $data->Logo_Alt2=$request->Logo_Alt2;



            if($request->hasFile('logo3')){
                $file3=$request->file('logo3');
                $newname3= time().rand(10,99).'.'.$file3->getClientOriginalExtension();
                $file3->move($path, $newname3);
                $data->logo3= $newname3;
            }
            $data->url_logo3=$request->url_logo3;
            $data->Logo_Title3=$request->Logo_Title3;
            $data->Logo_Alt3=$request->Logo_Alt3;


            if($request->hasFile('logo4')){
                $file4=$request->file('logo4');
                $newname4= time().rand(10,99).'.'.$file4->getClientOriginalExtension();
                $file4->move($path, $newname4);
                $data->logo4= $newname4;
            }

            $data->url_logo4=$request->url_logo4;
            $data->Logo_Title4=$request->Logo_Title4;
            $data->Logo_Alt4=$request->Logo_Alt4;




             if($request->hasFile('fevicon')){
                $file1=$request->file('fevicon');
                $newname1= time().rand(10,99).'.'.$file1->getClientOriginalExtension();
                $file1->move($path, $newname1);
                $data->fevicon= $newname1;
            }
            /*$data->fevicon_Title=$request->fevicon_Title;
            $data->fevicon_Alt=$request->fevicon_Alt;
            $data->url_fevicon=$request->url_fevicon;SKP*/


            if($request->hasFile('about_image')){
                $file5=$request->file('about_image');
                $newname5= time().rand(10,99).'.'.$file5->getClientOriginalExtension();
                $file5->move($path, $newname5);
                $data->about_image= $newname5;
            }

            if($request->hasFile('default_banner_image')){
                $file6=$request->file('default_banner_image');
                $newname6= time().rand(10,99).'.'.$file6->getClientOriginalExtension();
                $file6->move($path, $newname6);
                $data->default_banner_image= $newname6;
            }

            $data->save();
            Cache::forget('organization_details');
            return redirect()->route('admin.organisation')->with('success',$msg);
        }
        return view('admin.sections.addOrganisation',compact('data','title','id'));
    }

    function Add_OptionMaster(Request $request,$id=null){
        $data1=OptionsDump::groupBy('main')->get();
        if($id){
            $title="Edit Option Master";
            $msg="Option Master Edited Successfully!";
            $data=OptionsDump::find(dDecrypt($id));
        }
        else{
            $title="Add Option Master";
            $msg="Option Master Added Successfully!";
            $data=new OptionsDump;
        }
        if($request->isMethod('post')){
            $request->validate([
                'option'=>'required',
                'main'=>'required',
            ]);
         //if (!Schema::hasTable(Str::plural(strtolower(Str::snake($request->main, '_')))) || !Schema::hasTable('dynamic#'.Str::plural(strtolower(Str::snake($request->main, '_')))))
            if (Schema::hasTable(Str::plural(strtolower(Str::snake($request->main, '_')))) || Schema::hasTable('dynamic#'.Str::plural(strtolower(Str::snake($request->main, '_')))))
           {

            $data2=OptionsDump::where('option',ucwords($request->option))->first();
            $data21=OptionsDump::where('main',ucwords($request->main))->first();
            if(!$data2){
                $data3=new URLList;
                $data3->url=Str::slug(Str::plural($request->option));
                $data3->type=Str::plural(ucwords($request->option));
                $data3->table_name=$data21->table_name;
                $data3->save();
            }
            $data->option=ucwords(Str::plural($request->option));
            $data->main=ucwords($request->main);
            $data->table_name=$data21->table_name;
            $data->save();
            return redirect()->route('admin.optionsmaster')->with('success',$msg);
            }
           else{
            return redirect('/Accounts/create-database')->with('error','Create database first');
           }
        }
        return view('admin.Layout.addOptionsMaster',compact('data','title','id','data1'));
    }

    function Delete_OptionMaster($id){
          $data=OptionsDump::find(dDecrypt($id))->delete();
          return redirect()->back()->with('success','Record Deleted Successfully');
    }

     function Delete_OrganisationDetails($id){
          $data=Org::find(dDecrypt($id))->delete();
          return redirect()->back()->with('success','Record Deleted Successfully');
    }

    function Login(Request $request)
    {
        $title='Admin login  ';
        if(\Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        if($request->isMethod('post')){
            $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
            ]);
            if(\Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password,'status'=>1])){
                $data=Admin::find(\Auth::guard('admin')->user()->id);
                $data->update(['login_time'=>date('d-m-Y H:i:s'),'ip'=>$request->ip()]);
                return redirect()->route('admin.dashboard')->with('success','Hello '.$data->name.'. Welcome to admin panel !');
            }
            else{
                return redirect()->route('admin.login')->with('error','Invalid Credentials');
            }
        }
        return view('admin.index')->with(compact('title'));
    }

    function Dashboard(){
        $data=audit_log::simplePaginate(10);
        $title='Admin Dashboard ';
        return view('admin.dashboard',['data'=>$data])->with(compact('title'));
    }

    function View_OptionMaster(){
        $data=OptionsDump::whereNotNull('option')->orderBy('id','DESC')->cursor();
        return view('admin.Layout.OptionMaster',compact('data'));
    }

    function Change_Password(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'password'=>'required',
                'retype_password'=>'required|same:password',
            ]);
            Admin::find(\Auth::guard('admin')->user()->id)->update(['password'=>Hash::make($request->password)]);
            return redirect()->back()->with('success','Password Changed Successfully!');
        }
        return view('admin.users.change_pass');
    }

    function Logout(Request $request){
        $data=Admin::find(\Auth::guard('admin')->user()->id);
        $login_t=$data->login_time;
        $data->update(['last_login_time'=>$login_t,'logout_time'=>date('d-m-Y H:i:s'),'ip'=>$request->ip()]);
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logged Out successfully !');
    }

    function View_Admins(Request $request){
        $user=Admin::find(\Auth::guard('admin')->user()->id);
        $title='Manage Users ';
        $data=Admin::where('id','!=',1)->orderBy('id','DESC')->cursor();
        return view('admin.users.manageUser')->with(compact('data','title'));
    }

    function View_Roles(){
        $title='Manage Roles';
        $data=Role::where('name','!=','Super Admin')->orderBy('name','ASC')->cursor();
        return view('admin.users.manageRoles')->with(compact('data','title'));
    }

    function Add_Admins(Request $request,$id=null){
        if($id){
            $title='Edit User ';
            $msg= 'User Edited Successfully !';
            $data= Admin::find(dDecrypt($id));
        }
        else{
            $title='Add User';
            $msg= 'User Added Successfully !';
            $data= new Admin;
        }
        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'name'=>'required',
                'email' =>'required',
                'mobile' =>'required'
            ]);
            }
            else{
                 $request->validate([
                'name'=>'required',
                'email' =>'required | unique:admins',
                'mobile' =>'required'
            ]);
            }
            $data->name= ucwords($request->name);
            $data->mobile= $request->mobile;
            $data->email= $request->email;
            if(!$id){
            //$password=rand(10000,99999);
            $password=12345678;
            $data->password= Hash::make($password);
            //mail
            }
            $data->save();
            return redirect()->route('admin.manageadmin')->with('success',$msg);
        }
        return view('admin.users.add-admin')->with(compact('data','title','id'));
    }

    function Delete_Admin($id){
        Admin::find(dDecrypt($id))->delete();
        return redirect()->back()->with('success','Admin Entry Deleted Successfully!');
    }

    function ForgotPSW(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'email'=>'required',
                'captcha' => 'required|captcha'
            ]);
            $data=Admin::where('email',$request->email)->where('status',1)->first();
            if($data){
                $password=rand(10000,99999);
                $data->update(['password'=>Hash::make($password)]);
                    //mail
                return redirect()->back()->with('success','New password sent on your mail !');
            }
            else{
                 return redirect()->back()->with('error','Invalid user id !');
            }
        }
         return view('admin.forgotpsw');
    }

    function Admin_StatusChange($status,$id){
            Admin::find(dDecrypt($id))->update(['status'=>$status]);
            return redirect()->back()->with('success','Status Changed Successfully!');
    }

    function Create_DataBase(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'db'=>'required',
                'type'=>'required',
                'col_name'=>'required',
            ]);
            //dd($request->all());
            if(Schema::hasTable(Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db)))))) || Schema::hasTable('dynamic#'.Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db))))))){
                return redirect()->back()->with('error','Table already exits');
            }
            Schema::create('dynamic#'.Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db))))), function($table) use ($request)
            {
              $table->id();
                for($i=0;$i < count($request->type);$i++){
                    $fn='file'.$i;
                    $dn='dropdown'.$i;
                    if($request->type[$i]=='Varchar'){
                        if($request->$fn){
                            $name11='file#'.str_replace(' ','_',strtolower($request->col_name[$i]));
                        }
                        else{
                            $name11='text#'.str_replace(' ','_',strtolower($request->col_name[$i]));
                        }
                     $table->string($name11)->nullable();
                     }
                    else if($request->type[$i]=='Text'){
                     $table->longText('textarea#'.str_replace(' ','_',strtolower($request->col_name[$i])))->nullable();
                     }
                    else if($request->type[$i]=='Integer'){
                        if($request->$dn){
                            $name1='dropdown#'.str_replace(' ','_',strtolower($request->col_name[$i])).'#'.$request->dbn[$i];
                        }
                        else{
                            $name1='integer#'.str_replace(' ','_',strtolower($request->col_name[$i]));
                        }
                     $table->bigInteger($name1)->nullable();
                     }
                }
              $table->timestamps();
            });
            OptionsDump::insert([
                'main'=>ucwords($request->db),
                'type'=>'custom',
                'table_name'=>'dynamic#'.Str::plural(strtolower(Str::snake(str_replace('-',' ',str_replace("_",' ',$request->db)))))

            ]);
            return redirect()->route('admin.optionsmaster')->with('success','DB Created Successfully, Now Proceed ahead');
        }
        return view('admin.Layout.add_db');
    }
// my code



    function add_edit_project_logo(Request $request,$id=null){



    if($id){
        $title="Edit project logo";
        $data= project_logo::find(dDecrypt($id));
        $msg="project logo Edited Successfully";
    }
    else{
        $title="Add project logo";
        $data=new  project_logo;
        $msg="project logo Added Successfully";
    }
    if($request->isMethod('post')){
        if($id){
        $request->validate([
            'title'=>'required',
        ]);
        }
        else{
             $request->validate([
          //  'title'=>'required|unique:quick_links',
           // 'image'=>'required|mimes:jpg,jpeg,gif,png|dimensions:min_height=45,max_height=45,min_width=45,max_width=45',
        ]);
        }


        $data->number=$request->number;
        $data->name=$request->name;
        $data->name_h=$request->name_h;
        if($request->hasFile('image')){
            $path=public_path('uploads/project_icons');
            $file=$request->file('image');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image= $newname;
        }
        $data->save();
        return redirect('/Accounts/add_edit_project_logo')->with('success',$msg);
    }
    return view('admin.sections.addproject_logo',compact('data','id','title'));

}

//who is who dropdown

            public function Department_info()
            {
                $data =OrganisationStructure::all();
                return response()->json(['data'=>$data]);
            }


}
