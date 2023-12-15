<?php

function encode5t($str)
{
  for($i=0; $i<5;$i++) //increase the level
  {
$str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
  }
  return $str;
}


//function to decrypt the string
function decode5t($str)
{
  for($i=0; $i<5;$i++)
  {
    $str=base64_decode(strrev($str));
  }
  return $str;
}

 function GetLang(){
   return config('app.locale');
}

 function GetVisits(){
    $d=\App\Models\VisitorCount::orderBy('id','DESC')->take(1)->get();
    if(count($d) > 0){
        return $d[0]->counter;
    }
    return 'Yet To Start';
}

 function FindColType($table,$col){
    return \DB::getSchemaBuilder()->getColumnType($table,$col);
}

 function GetLastUpdate(){
    $data=\App\Models\VisitorCount::orderBy('id','DESC')->skip(5)->take(1)->get();
    if(count($data) > 0){
    return @$data[0]->date;
    }
    return date('d-m-Y H:i:s');
}

 function SlugCheck($table,$title, $id=0){
   $test=\DB::table($table)->where('slug',\Str::slug($title))->exists();
   if($test){
    //$slug=\Str::slug($title).'-'.mt_rand(1,10);
    $slug=\Str::slug($title);
   }
   else{
    $slug=\Str::slug($title);
   }
   return $slug;
}

 function SeePermission($function){

	$user=\App\Models\Admin::find(\Auth::guard('admin')->user()->id);

	return $user->hasPermissionTo($function,'admin');

}

 function FindQuickLink(){
      $data=\App\Models\QuickLink::where('status',1)->orderBy('id','DESC')->take(9)->cursor();

       return @$data;

}

function FindQuickLinksNew($placement='',$sort_order=''){
  $linkcategory=\App\Models\quick_linkcategory::where('status',1)->where('placement',$placement)->where('sort_order',$sort_order)->get();
  if(count($linkcategory)>0){
   $linkcategory = $linkcategory->first();
    $data=\App\Models\QuickLink::where('status',1)->where('link_category',$linkcategory->title)->orderBy('sort_order','ASC')->cursor();

    if(count($data)>0){
      return ['linkcategory'=>$linkcategory,'links'=>$data];
    }
  }

   return 0;

}

 function dEncrypt($value){

      $newkey='AX345678ZX98765Y';

      $newEncrypter = new \Illuminate\Encryption\Encrypter($newkey,'AES-128-CBC');
//dd($newEncrypter);
      return $newEncrypter->encrypt($value);

   }

 function dDecrypt($value){

      $newkey='AX345678ZX98765Y';

      $newEncrypter = new \Illuminate\Encryption\Encrypter($newkey,'AES-128-CBC');

      return $newEncrypter->decrypt($value);

   }



 function GetOptionName($id,$param){

      $data=\App\Models\OptionsDump::find($id);

      return $data->$param;

   }


 function GetOptionsByName($name){

      $data=\App\Models\OptionsDump::where('main',$name)->orderBy('option','ASC')->cursor();

      return $data;

   }



 function GetOrganisationDetails($param){

       $data=\App\Models\Org::first();
       if(strtolower($param) =='name'){
        if(GetLang()=='en'){
            return @$data->name;
        }
        else{
            return @$data->name_h;
        }
       }
      return @$data->$param;

   }

   function GetOrganisationAllDetails($param){
    $rememberTimeInSeconds = 3600;
    $cachedResult = Cache::remember('organization_details', $rememberTimeInSeconds, function(){
      $data=\App\Models\Org::first();
      return $data;
    });

    if(strtolower($param) =='name'){
     if(GetLang()=='en'){
         return @$cachedResult->name;
     }
     else{
         return @$cachedResult->name_h;
     }
    }

   return @$cachedResult->$param;

  }

     function FindSiteSettings($page_type,$param){

      $data=\App\Models\SiteSetting::where('page_type',$page_type)->first();

      return @$data->$param;

   }



     function FindBanners($type){

       $data=\App\Models\BannerSlider::where('type',$type)->where('status',1)->orderBy('id','DESC')->cursor();

       return @$data;

   }








  function GetMenu(){

    $data=\App\Models\MainMenu::with('GetSubMenus')->get();
    return @$data;

  }

  function GetSubMenus($id){
    $data=\App\Models\SubMenu::where('menu_id',$id)->get();
    return @$data;
  }


  function GetchildMenus($menuid,$subid){
    $data=\App\Models\child_menu::where('menu_id',$menuid)->where('sub_id',$subid)->get();
    return @$data;
  }


  function GetsubchildMenus($menuid,$subid,$cm){
    $data=\App\Models\subchildmenu::where('menu_id',$menuid)->where('sub_id',$subid)->get();
    return @$data;
  }


  function GetMenuFront(){

    $data=\App\Models\MainMenu::with('GetSubMenus')->where('status','1')->get();
    return @$data;

  }







  /////////////////////////////////////////
  function GetSubMenusFront($id){
    $data=\App\Models\SubMenu::where('menu_id',$id)->orderBy('sort_order','Asc')->where('status','1')->get();
    return @$data;
  }


  function GetchildMenusFront($menuid,$subid){
    $data=\App\Models\child_menu::where('menu_id',$menuid)->orderBy('sort_order','Asc')->where('sub_id',$subid)->where('status','1')->get();
    return $data;
  }



  function GetchildMenusFronts($menuid,$subid){
    $data=\App\Models\child_menu::where('menu_id',$menuid)->orderBy('sort_order','Asc')->where('sub_id',$subid)->where('status','1')->get();
   //dd($data);
    return $data;
  }

  function GetsubchildMenusFront($menuid,$subid,$child){
    $data=\App\Models\subchildmenu::where('menu_id',$menuid)->orderBy('sort_order','Asc')->where('sub_id',$subid)->where('child_id',$child)->where('status','1')->get();
    //dd($data);
    return @$data;
  }




//inner page sub menu







 function GetUSPs(){
    $data=\App\Models\USP::cursor();

    return @$data;
  }

 function GetActiveUSPs(){
       $data=\App\Models\USP::where('status',1)->cursor();

       return @$data;
  }

 function GetActiveMenu(){

       $data=\App\Models\MainMenu::where('status',1)->with('GetActiveSubMenu')->get();

       return @$data;

   }


 function GetAnnouncements($type){

      $data = \App\Models\Announcement::where('type',$type)->where('status',1)->orderBy('id','DESC')->take(3)->get();

      return $data;

   }

 function FindUniqueDb(){
        $data=\App\Models\OptionsDump::orderBy('main','ASC')->groupBy('main')->cursor();
        return $data;
   }

 function getMonth($x){
    $locale=app()->getLocale();
    if($locale=='en'){
     $month = [
          '01'=>'Jan',
          '02'=>'Feb',
          '03'=>'Mar',
          '04'=>'Apr',
          '05'=>'May',
          '06'=>'Jun',
          '07'=>'Jul',
          '08'=>'Aug',
          '09'=>'Sep',
          '10'=>'Oct',
          '11'=>'Nov',
          '12'=>'Dec'
      ];
    }
    else{
     $month = [
          '01'=>'जनवरी',
          '02'=>'फ़रवरी',
          '03'=>'मार्च',
          '04'=>'अप्रैल',
          '05'=>'मई',
          '06'=>'जून',
          '07'=>'जुलाई',
          '08'=>'अगस्त',
          '09'=>'सितंबर',
          '10'=>'अक्टूबर',
          '11'=>'नवम्बर',
          '12'=>'दिसम्बर'
      ];
    }
    foreach ($month as $K=>$M){
        if($K==$x){
            return $M;
        }
    }
}

 function getdrpVal($id,$name,$colname){
    $data=\App\Models\OptionsDump::find($id);
    $tn=explode('#',$data->table_name);
    $data2=\DB::table($data->table_name)->get();

   if(isset($tn[0]) && $tn[0]=='dynamic'){
    ?>
     <div class="col-md-6">
                <div class="form-group"> <label for="form_name"><?php echo $name;?>*</label>
                <select name="<?php echo $colname;?>" class="form-control" >
                 <option value="">Please Select</option>

    <?php foreach($data2 as $D){ ?>

        <option value="<?php echo $D->id;?>"><?php echo $D->text#title;?></option> <?php } ?>
         </select>
                </div></div>
        <?php
        }else{ ?>

            <div class="col-md-6">
                <div class="form-group"> <label for="form_name"><?php echo $name;?>*</label>
                <select name="<?php echo $colname;?>" class="form-control" >
                 <option value="">Please Select</option>

    <?php foreach($data2 as $D){ ?>

        <option value="<?php echo $D->id;?>"><?php echo $D->title;?></option> <?php } ?>
         </select>
                </div></div>
        <?php
        }

        }


    function TextForm($data,$table){

        foreach($data as $D){
        if($D =='created_at' || $D =='updated_at' || $D =='id'){
            echo ' ';
        }
        else{
        $a=explode('#',$D);
        $name=$a[1];
        $type=FindColType($table,$D);

        if(isset($name)){


        if($type=='string'){
            if($a[0]=='file'){
                echo '
                <div class="col-md-6">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label>
                <input type="file" name="'.$D.'" class="form-control" placeholder="please enter '.ucwords($name).'">
                </div></div>';
            }
            else{
                echo '
                <div class="col-md-6">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label>
                <input type="text" name="'.$D.'" class="form-control" placeholder="please enter '.ucwords($name).'">
                </div></div>';
            }
            }


         }
         }
      }

    }


    function IntegerForm($data,$table){
         foreach($data as $D){
        if($D =='created_at' || $D =='updated_at' || $D =='id'){
            echo ' ';
        }
        else{
        $a=explode('#',$D);
        $name=$a[1];
        $type=FindColType($table,$D);

        if(isset($name)){



        if($type=='bigint'){
            if($a[0]=='dropdown'){
                getdrpVal($a[2],$name,$D);
            }
            else{
                 echo '
                <div class="col-md-6">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label>
                <input type="number" name="'.$D.'" class="form-control" placeholder="please enter '.ucwords($name).'">
                </div></div>';
            }
            }

         }
         }
      }

    }

    function TextareaForm($data,$table){
         foreach($data as $D){
        if($D =='created_at' || $D =='updated_at' || $D =='id'){
            echo ' ';
        }
        else{
        $a=explode('#',$D);
        $name=$a[1];
        $type=FindColType($table,$D);

        if(isset($name)){



            if($type=='text'){
                echo '
                <div class="col-md-12">
                <div class="form-group"> <label for="form_name">'.ucwords($name).'*</label>
                <textarea name="'.$D.'" id="ta"> </textarea>
                </div></div><script>CKEDITOR.replace("'.$D.'");</script>';

            }
         }
         }
      }

    }


        function content_menus($id=0){
            if($id>0)
            $data=\App\Models\MainMenu::where('status','1')->where('id',$id)->get();
            else
            $data=\App\Models\MainMenu::where('status','1')->get();
            return @$data;
        }


      function  Getsliderimage(){
       $data=\App\Models\BannerSlider::where('status','1')->orderBy('short_order','ASC')->get();
      return @$data;
      }



      function Getfirstslider($param){
        $data=\App\Models\BannerSlider::first();
        return @$data->$param;
       }

      function Getchulmrnucount($menuids,$subids){
        $data=\App\Models\child_menu::where('menu_id',$menuids)->where('sub_id',$subids)->count();
        return @$data;

      }


  //header top section

  function  GETheaderTop(){
    $data=\App\Models\quick_linkcategory::where('Placement','section11')->orderBy('id','DESC')->where('status','1')->get();
    return @$data;
    }


    function GETheadertopcontent($id){
      $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->get();
    return @$value ;
    }


 //client logo middle section

    function  GETClientlogoTop(){
       $data=\App\Models\quick_linkcategory::where('Placement','section12')->orderBy('id','DESC')->where('status','1')->get();
     return @$data;
    }


    function GETClientlogomiddleTop($id){
        $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->get();


        return @$value ;
    }




  // Academics section1

          function  GETServiecscontent(){
          $data=\App\Models\quick_linkcategory::where('Placement','section1')->orderBy('id','DESC')->where('status','1')->get();
          return @$data;
          }


          function GETcontentservices($id){
            $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->get();
        //    $value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya
            return @$value ;
          }



//student corner section


          function  GETstudent(){
            $data=\App\Models\quick_linkcategory::where('Placement','section2')->orderBy('id','DESC')->where('status','1')->get();
            return @$data;
            }


            function Getstundentdetail($id){

                $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->get();
                      return @$value ;
            }

             //iim students life colum dynamic
            function GetstundentdetailS($id){

                $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->take(1)->orderBy('id','ASC')->get();
               // dd($value);
                return @$value ;
            }



//Category Section1 & Section2 & setion3
// new event
          function  GETprocces(){
            $data=\App\Models\quick_linkcategory::where('Placement','section3')->orderBy('id','DESC')->where('status','1')->get();
            return @$data;
            }

           //industry connect

            //notice board
            function  GETproccesB(){
            $data=\App\Models\quick_linkcategory::where('Placement','section3')->orderBy('id','DESC')->where('status','1')->where('news_type',3)->get();
            return @$data;
            }


            function Getheading($id){

            $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->where('news_type',3)->get();
             //$value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya
            return @$value ;
            }

            function GetheadingN($id){

            $value=\App\Models\QuickLink::orderBy('id', 'desc')->where('link_category',$id)->where('status','1')->where('news_type',1)->get();
             //$value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya
            return @$value ;
            }

            function GetheadingI($id){

            $value=\App\Models\QuickLink::orderBy('id', 'desc')->where('link_category',$id)->where('status','1')->where('news_type',2)->get();
             //$value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya
            return @$value ;
            }


//            function  GETprocces(){
//            $data=\App\Models\quick_linkcategory::where('Placement','section3')->orderBy('id','DESC')->where('status','1')->get();
//            return @$data;
//            }
//
//
//            function Getheading($id){
//
//                $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->get();
//             //$value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya
//            return @$value ;
//            }




//project logo

            function getproject_logo()
            {
            $data=\App\Models\project_logo::orderBy('id','DESC')->wherestatus('1')->take(3)->get();
            return $data;
            }



  //Center of Excellences  section


          function  GETurl(){
          $data=\App\Models\quick_linkcategory::where('Placement','section4')->orderBy('id','DESC')->where('status','1')->get();
          return @$data;
          }


          function Geturldetail($id){
           // $value=DB::table('content_pages')->where('link_category',$id)->where('quick_links.status','1')->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->take($limit)->orderBy('sort_order', 'ASC')->get();  //two table data show karna ka leya
           $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->get();  //two table data show karna ka leya
          return @$value ;
          }



            function Getexterlink($id){
            $value=\App\Models\QuickLink::whereexternal('yes')->take(2)->orderBy('id', 'DESC')->get();
            return @$value ;
            }



//photo gallery section

        function  GETphoto(){
        $data=\App\Models\quick_linkcategory::where('Placement','section5')->orderBy('id','DESC')->where('status','1')->get();
        return @$data;
        }


        function getphoto_link($id){
        $value=DB::table('photo_galleries')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'photo_galleries.id')->take(4)->get();  //two table data show karna ka leya
        return @$value ;
        }



        //video gallery section


        function  GEtvideo(){
        $data=\App\Models\quick_linkcategory::where('Placement','section6')->orderBy('id','DESC')->where('status','1')->get();
        return @$data;
        }


        function getVideo_link($id){
        $value=DB::table('video_galleries')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'video_galleries.id')->take(4)->get();  //two table data show karna ka leya
        return @$value ;
        }


        //website logo   default name Logo dana hoga

                function  Getsmallphoto(){
                $data=\App\Models\FileToUrl::take(10)->where('status','1')->get();
                return @$data;
                }




//footer section 7

        function  Getfooterlink(){
        $data=\App\Models\quick_linkcategory::where('Placement','section8')->orderBy('id','DESC')->where('status','1')->get();
        return @$data;
        }


    function GETfooterdatalink($id){

        $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->orderBy('sort_order', 'ASC')->get();

       // $value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya

       return @$value;

    }

//footer section 8

        function  Getfooterlink2(){

        $data=\App\Models\quick_linkcategory::where('Placement','section9')->orderBy('id','DESC')->where('status','1')->get();
        return @$data;
        }


        function GETfooterdatalink2($id){

            $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->take($limit)->orderBy('sort_order', 'ASC')->get();
            //$value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya


        return @$value;

        }

        function GetTemplatesList(){
        return Array('0'=>'Default','1'=>'Board of Governors','2'=>'Director Profile','3'=>'Faculties Directory','4'=>'visiting faculity','5'=>'International Relations Team','6'=>'Partnerships Collaborations','7'=>'mba Testimonials','8'=>'Master Page','9'=>'Club,Cell & Committee','10'=>'Our Journey','11'=>'placement(The Team)','12'=>'Alumni(The Team)','13'=>'mba(Analytics)Testimonials');
        }


        function userAthorty()
        {

             $data=\App\Models\Admin::whereid(\Auth::guard('admin')->user()->id)->get('id');

             if(isset($data[0]))$type=\App\Models\Model_has_role::wheremodel_id($data[0]->id)->get();
             else return false;

             $role=\App\Models\Role::whereid($type[0]->role_id)->get();

             if(isset($role[0]))$role_permission=\App\Models\Role_has_permission::whererole_id($role[0]->id)->get('permission_id');
             else return false;

             $permission_id=[];
             if(isset($role_permission[0])){
                foreach($role_permission as $key=>$value)
                {
                    $permission_id[]=$value->permission_id;
                }
              } else return false;

            $permission=\App\Models\Permission::whereIn('id',$permission_id)->get('name');

             if(isset($permission[0])){
                $permissions=[];
                foreach($permission as $key=>$value)
                {
                    $permissions[]=$value->name;
                }
                //dd($permissions);
              return  $permissions;
             }

             return false;
        }



        function getRoutePermissions()
        {
          /*$rememberTimeInSeconds = 3600;
            $cachedResult = Cache::remember('route_data', $rememberTimeInSeconds, function(){
            $data=userAthorty();
            return $data;
          });*/

          return userAthorty();
        }

        function checkRoute($route_name='')
        {
          if(\Auth::guard('admin')->user()->id==1) return true;
           $route_permissions=getRoutePermissions();
              //dd($route_permissions);
             if($route_permissions!=false){
                if(in_array($route_name,$route_permissions))
                  return true;
                else
                  return false;
            }

            return false;
        }

        function get_dept_name($id)
        {
//            return;
            //$id = 62;
            $dept_name_list=App\Models\FacultyDepartment::orderby('id','desc')
                    ->where('faculty_id',$id)
                    ->first();
            //dd($dept_name_list);

            if(isset($dept_name_list->faculty_dept_id))
            {
                $faculty_dept_id = $dept_name_list->faculty_dept_id;
                $faculty_dept_name_record=App\Models\Department::find($faculty_dept_id);

                //dd($faculty_dept_name_record);

                $faculty_dept_name = $faculty_dept_name_record->dept_name;
                return $faculty_dept_name;
            }
            else
            {
                return;
            }


        }

        function  Getfooterlink3(){

        $data=\App\Models\quick_linkcategory::where('Placement','section10')->orderBy('id','DESC')->where('status','1')->get();
        return @$data;
        }


        function GETfooterdatalink3($id){

            $value=\App\Models\QuickLink::where('link_category',$id)->where('status','1')->take($limit)->orderBy('sort_order', 'ASC')->get();
            //$value=DB::table('content_pages')->where('link_category',$id)->join('quick_links', 'quick_links.link_option', '=', 'content_pages.id')->get();  //two table data show karna ka leya


        return @$value;

        }

    function formatSizeUnits($bytes)
        {
            if ($bytes >= 1073741824)
            {
                $bytes = number_format($bytes / 1073741824, 2) . 'GB';
            }
            elseif ($bytes >= 1048576)
            {
                $bytes = number_format($bytes / 1048576, 2) . 'MB';
            }
            elseif ($bytes >= 1024)
            {
                $bytes = number_format($bytes / 1024, 2) . 'KB';
            }
            elseif ($bytes > 1)
            {
                $bytes = $bytes . ' bytes';
            }
            elseif ($bytes == 1)
            {
                $bytes = $bytes . ' byte';
            }
            else
            {
                $bytes = '0 bytes';
            }

            return $bytes;
    }



    function Getarchivedata($date,$adate){
            $formatted_dt1=Carbon\Carbon::parse($date);
            $formatted_dt2=Carbon\Carbon::parse($adate);


            if($formatted_dt1 >=  $formatted_dt2){
                return 'True';
            }else{
                return false;
            }

    }

?>
