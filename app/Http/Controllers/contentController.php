<?php

namespace App\Http\Controllers;
use App\Models\content_page;
use App\Models\MainMenu;
use Image;
use File;
use Helper;
use validataion;
use App\Models\upload;
use Redirect;

use Illuminate\Http\Request;

class contentController extends Controller
{

    public function Show_Content($id){
        $data=content_page ::find(dDecrypt($id));
       return view("admin.pages.view_content_page",['data'=>$data]);
      }


    public function View_Content(){
    $data =content_page::where('parent_id',NULL)->orderBy('id','DESC')->get();
    return view('admin.pages.content_list',["data"=>$data]);
    }

    public function Show_Content_Child(Request $request,$id){
        $data=\App\Models\content_page::where('parent_id','=',dDecrypt($id))->get();
        return view('admin.pages.content_list',['data'=>$data]);
    }


    function Add_Content(){
    return view('admin.pages.add_content_page');
    }

    public function Add_Content_Submit(Request $request){


    $request->validate(
    [
    'name'         =>        'required|unique:content_pages',
    'name_h'             =>       'required',
    'imagename'          =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
    'bannerimage'       =>        'image|mimes:jpeg,png,jpg,gif|max:2048',
    "file"            =>          "mimes:pdf|max:10000"
    ]

    );

    $e = new content_page();
    $destinationPath="";
    $image = $request->file('imagename');
    if($image==null){
        $input['imagename'] ="default.jpg";
    }else{
    $input['imagename'] = time().'.'.$image->extension();

    $destinationPath = public_path('page/image');
    $img = Image::make($image->path());
    $img->resize(400,200, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);

    $image->move($destinationPath, $input['imagename']);
    }

    $Banner_destinationPath="";
    $Banner_image=$request->file('bannerimage');
    if($Banner_image==null){
    $input['bannerimage'] ="default.jpg";
    }else{
    $input['bannerimage']=time().'.'.$Banner_image->extension();
    $Banner_destinationPath = public_path('page/banner');
    $img2 = Image::make($Banner_image->path());
    $img2->resize(1000,300, function ($constraint) {
    $constraint->aspectRatio();
    })->save($Banner_destinationPath.'/'.$input['bannerimage']);
    $e->url=("content/".$input['bannerimage']);
    $Banner_image->move($Banner_destinationPath, $input['bannerimage']);
    }

    //enter data in data base
    $e->name=$request->name;
    $e->name_h=$request->name_h;
    $e->content=$request->content;
    $e->content_h=$request->content_h;
    $e->cover_image=$input['imagename']; //image file path
    $e->banner_image=$input['bannerimage'] ; //banner image save
    // $e->file_download=$input['pdf'] ;//pdf save
    $e->meta_title=$request->tittle;
    $e->meta_keywords=$request->keyword;
    $e->meta_description=$request->description ;
    $e->banner_title=$request->banner_title;
    $e->banner_alt=$request->banner_alt;
    $e->cover_title=$request->cover_title;
    $e->cover_alt=$request->cover_alt;
    $e->sort_order=$request->sort_order;
    $e->status=$request->status;
    $e->delete_range=$request->delete_range;
    $e->slug=\Str::slug($request->name);

    $e->video_url= $request->video_url;
    $e->video_title= $request->video_title;

    if($request->parent_id != 'pages-list'  ){
        $e->parent_id=dDecrypt($request->parent_id);
    }else{
        $e->parent_id= NULL;
    }

    if($request->hasfile('pdf'))
    {
    $img = $request->file('pdf');
    $e->pdfsize=$request->pdf->getSize();
    $name =$img->getClientOriginalName();
    $filename = time().$name;
    $img->move('page/pdf',$filename);
    $e->file_download=$filename;
    }
    $e->save();
    return redirect("/Accounts/pages-list")->with('success', 'Record Add Succesfull!!');
}

    public function Update_Content($id){
    $data=content_page ::find(dDecrypt($id));
    return view("admin.pages.update_content_page",['data'=>$data]);
    }

    public function Update_Content_Submit(Request $request ,$id){

    $request->validate(
    [
    'name'              =>      'required',
    'name_h'             =>      'required',
    'imagename'          =>      'image|mimes:jpeg,png,jpg,gif|max:2048',
    'bannerimage'       =>       'image|mimes:jpeg,png,jpg,gif|max:2048',
    'pdf'                =>       "mimes:pdf|max:10000"
    ]
    );

    // //new banner image upload
    // $bannerimage="";
    // $input['bannerimage']=$request->bannernameold;
    // if ($request->hasFile('bannerimage')) {
    // $this->validate($request, [
    // 'bannerimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ]);
    // $Banner_image=$request->file('bannerimage');
    // $input['bannerimage']=time().'.'.$Banner_image->extension();
    // $Banner_destinationPath = public_path('page/banner');
    // $img2 = Image::make($Banner_image->path());
    // $img2->resize(1000,300, function ($constraint) {
    // $constraint->aspectRatio();
    // })->save($Banner_destinationPath.'/'.$input['bannerimage']);
    // $Banner_image->move($Banner_destinationPath, $input['bannerimage']);
    // }

    // //new image upload
    // $input['imagename']=$request->imagenameold;
    // if ($request->hasFile('imagename')) {
    // $this->validate($request, [
    // 'imagename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ]);
    // $image = $request->file('imagename');
    // $input['imagename'] = time().'.'.$image->extension();
    // $destinationPath = public_path('page/image');
    // $img = Image::make($image->path());
    // $path=   $img->resize(400,200, function ($constraint) {
    // $constraint->aspectRatio();
    // })->save($destinationPath.'/'.$input['imagename']);
    // $image->move($destinationPath, $input['imagename']);
    // }


        //pdf update
        // $input['pdf']=$request->pdfnameold;
        // if ($request->hasFile('pdf')){
        // $this->validate($request, [

        // 'pdf'                =>       "mimes:pdf|max:10000"

        // ]);
        // $pdf=$request->file('pdf');
        // $input['pdf']=time().'.'.$pdf->extension();
        // $pdf_destinationPath = public_path('page/pdf');

        // $pdf_destinationPath = public_path('page/pdf');
        // $pdf->move($pdf_destinationPath, $input['pdf']);

        // }


        $u=Content_Page::find(dDecrypt($id));
        $u->name=$request->name;
        $u->name_h=$request->name_h;
        $u->content=$request->content;
        $u->content_h=$request->content_h;
        // $u->cover_image=$input['imagename']; //image file path
        // $u->banner_image=$input['bannerimage'];
        // $u->file_download=$input['pdf'];
        $u->meta_title=$request->tittle;
        $u->meta_keywords=$request->keyword;
        $u->meta_description=$request->description ;
        $u->banner_title=$request->banner_title;
        $u->banner_alt=$request->banner_alt;
        $u->cover_title=$request->cover_title;
        $u->cover_alt=$request->cover_alt;
        $u->sort_order=$request->sort_order;
        $u->status=$request->status;
        $u->delete_range=$request->delete_range;
        $u->parent_id=$request-> parent_id;
        $u->slug=\Str::slug($request->name);

        $u->video_url= $request->video_url;
        $u->video_title= $request->video_title;

        if($request->hasfile('bannerimage'))
        {
        $img = $request->file('bannerimage');
        $name =$img->getClientOriginalName();
        $filename = time().$name;
        $img->move('page/banner',$filename);
        $u->Banner_image=$filename;
        }

        if($request->hasfile('imagename'))
        {
        $img = $request->file('imagename');
        $name =$img->getClientOriginalName();
        $filename = time().$name;
        $img->move('page/image',$filename);
        $u->cover_image=$filename;
        }

        if($request->hasfile('pdf'))
        {
        $img = $request->file('pdf');
        $u->pdfsize=$request->pdf->getSize();
        $name =$img->getClientOriginalName();
        $filename = time().$name;
        $img->move('page/pdf',$filename);
        $u->file_download=$filename;
        }

    $u->save();
    return Redirect::to("/Accounts/pages-list")->with('success','Record Update Successfully');
    }

    public function Delete_Content($id){
    $data=content_page ::find(dDecrypt($id));
    $data->delete();
    return redirect("/Accounts/pages-list")->with('success','Record Deleted Successfully');
    }



    public function indexdropdown(){
    $data=content_page::get();
    return response()->json(['data'=>$data]);
    }


//file and image upload
function view_pdfImage(){
    $data=upload::orderBy('id','DESC')->cursor();
    return view('admin.sections.manageImagePdf',compact('data'));
}

function Delete_pdfImage($id){
    $exit = upload::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        upload::find(dDecrypt($id))->delete();
    }else{
        return redirect('Accounts/pdf-image')->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect('Accounts/pdf-image')->with('success','Admin Entry Deleted Successfully!');
}

function Add_pdfImage(Request $request,$id=null){
    if($id){
         $title="Edit PDF/Image Upload";
         $msg="File Edited Successfully!";
         $data=upload::find(dDecrypt($id));

     }
     else{
          $title="Add PDF/Image Upload";
          $msg="File Added Successfully!";
          $data=new upload;
     }

    if($request->isMethod('post')){

        if($id){
            $request->validate([
                'title'=>'required',
                'file'=>'mimes:jpg,jpeg,gif,png,pdf',
            ]);
            }
            else{
              $request->validate([
                'title'=>'required|unique:uploads',
                'file'=>'mimes:jpg,jpeg,gif,png,pdf',
            ]);
            }

        $data->title=ucwords($request->title);
        $data->status=$request->status;
        $data->type=$request->type;
        if($request->type == 1){
            $path=public_path('admin/pdf');
        }else{
            $path=public_path('admin/images');
        }
        if($request->hasFile('file')){
            $file=$request->file('file');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->file= $newname;
            if($request->type == 1){
            $data->path=('/admin/pdf/'.$newname);
            }else{
               $data->path=('/admin/images/'.$newname);
            }
        }
        $data->save();
        return redirect('Accounts/pdf-image')->with('success','Url created Successfully',$msg);
    }
     return view('admin.sections.addImagePdf',compact('data','title','id'));
    }



}
