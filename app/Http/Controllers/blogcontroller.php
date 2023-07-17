<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use Image;
use File;
use Helper;
use validataion;
use str;

class blogcontroller extends Controller
{

    public function blogdata()
    {
        $data=blog::get();
        return response()->json(['data'=>$data]);
    }

    public function show_blog_page_list()
    {
        $data=blog::get();
        return view("admin.blog.show_blog",['data'=>$data]);
    }
    
    public function add_blog_content_page()
    {
        return view("admin.blog.add_blog");
    }



    public function update_blog_content_data_submit(Request $request){

        $request->validate(
            [
               'name'              =>        'required|string|max:200',
               'name_h'             =>       'required|string|max:200',
               'content'              =>     'required|string|min:100',
               'contnet_h'             =>    'string|min:100',
               'imagename'          =>       'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               'bannerimage'       =>        'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               "file"            =>          "mimes:pdf|max:10000"
              
            ]

        );  


        $destinationPath="";
        $image = $request->file('imagename');
        if($image==null){
            $input['imagename'] ="default.jpg";
        }else{
        $input['imagename'] = time().'.'.$image->extension();
        $img = Image::make($image->path());
        $img->resize(400,200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        $destinationPath = public_path('blog\image'); 
        $image->move($destinationPath, $input['imagename']);
        }



        $Banner_destinationPath="";
        $Banner_image=$request->file('bannerimage');
        if($Banner_image==null){
            $input['bannerimage'] ="default.jpg";
        }else{
            $input['bannerimage']=time().'.'.$Banner_image->extension();
            $img2 = Image::make($Banner_image->path());
            $img2->resize(1000,300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($Banner_destinationPath.'/'.$input['bannerimage']);    
            $Banner_destinationPath = public_path('blog\banner');
            $Banner_image->move($Banner_destinationPath, $input['bannerimage']);
        }




        $pdf_destinationPath="";
        $pdf=$request->file('pdf');
        if($pdf==null){
            $input['pdf'] ="default.jpg";
        }else{
            $input['pdf']=time().'.'.$pdf->extension();        
            $pdf_destinationPath = public_path('blog\pdf');
            $pdf->move($pdf_destinationPath, $input['pdf']);
        }
    
   //enter data in data base 
      
        $e = new blog();
        $e->name=$request->name;
        $e->name_h=$request->name_h;
        $e->content=$request->content;
        $e->content_h=$request->content_h;
        $e->cover_image=$input['imagename']; //image file path 
        $e->banner_image=$input['bannerimage'] ; //banner image save
        $e->file_download=$input['pdf'] ;//pdf save
        $e->meta_title=$request->tittle;
        $e->meta_keywords=$request->keyword;
        $e->meta_description=$request->description ;  
        $e->banner_title=$request->banner_title;
        $e->banner_alt=$request->banner_alt;
        $e->cover_title=$request->cover_title;
        $e->cover_alt=$request->cover_alt;
        $e->sort_order=$request->sort_order;
        $e->status=$request->status;
        $e->parent_id=$request-> parent_id;
        $e->slug=\Str::slug($request->name);
        $e->save();
        return redirect("/Accounts/show_blog")->with('success', 'Data Add Succesfull!!');
        } 
    


            public function update_blog_content_page($id){
            $data=blog ::find($id);
            return view("admin.blog.update_blog",['data'=>$data]);
            }

            public function update_blogpost( Request $request ,$id){     
                    
               $request->validate(
                    [
                       'name'              =>      'required|string|max:200',
                       'name_h'             =>      'required|string|max:200',
                       'imagename'          =>      'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                       'bannerimage'       =>       'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'pdf'                =>       "mimes:pdf|max:10000"
                    ]
                );  
        
        
       


//new banner image upload
$bannerimage="";
$input['bannerimage']=$request->bannernameold;
if ($request->hasFile('bannerimage')) {
    $this->validate($request, [
        
        'bannerimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

     ]);
    $Banner_image=$request->file('bannerimage');
    
    $input['bannerimage']=time().'.'.$Banner_image->extension();
    $Banner_destinationPath = public_path('blog\banner');
    $img2 = Image::make($Banner_image->path());
    $img2->resize(1000,300, function ($constraint) {
        $constraint->aspectRatio();
    })->save($Banner_destinationPath.'/'.$input['bannerimage']);
       $Banner_destinationPath = public_path('blog\banner');
       $Banner_image->move($Banner_destinationPath, $input['bannerimage']);

}
     


//new image upload
$input['imagename']=$request->imagenameold;
if ($request->hasFile('imagename')) {
    $this->validate($request, [
        
        'imagename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

     ]);
    $image = $request->file('imagename');
   
    $input['imagename'] = time().'.'.$image->extension();
    $destinationPath = public_path('blog\image');

  
       $img = Image::make($image->path());
    $path=   $img->resize(400,200, function ($constraint) {
        $constraint->aspectRatio();
       })->save($destinationPath.'/'.$input['imagename']);

       $destinationPath = public_path('blog\image'); 
       $image->move($destinationPath, $input['imagename']);     
}


//pdf update 
$input['pdf']=$request->pdfnameold;
if ($request->hasFile('pdf')){
    $this->validate($request, [
        
      'pdf'                =>       "mimes:pdf|max:10000" 

     ]);
    $pdf=$request->file('pdf');
    $input['pdf']=time().'.'.$pdf->extension();
    $pdf_destinationPath = public_path('blog\pdf');
   
    $pdf_destinationPath = public_path('blog\pdf');
    $pdf->move($pdf_destinationPath, $input['pdf']);

}

            $u=blog::find($id);
            $u->name=$request->name;
            $u->name_h=$request->name_h;
            $u->content=$request->content;
            $u->content_h=$request->content_h;
            $u->cover_image=$input['imagename']; //image file path 
            $u->banner_image=$input['bannerimage'];
            $u->file_download=$input['pdf'];
            $u->meta_title=$request->tittle;
            $u->meta_keywords=$request->keyword;
            $u->meta_description=$request->description ;  
            $u->banner_title=$request->banner_title;
            $u->banner_alt=$request->banner_alt;
            $u->cover_title=$request->cover_title;
            $u->cover_alt=$request->cover_alt;
            $u->sort_order=$request->sort_order;
            $u->status=$request->status;
            $u->parent_id=$request-> parent_id;
            $u->slug=\Str::slug($request->name);
            $u->save();
            return redirect("/Accounts/show_blog")->with('success','Record Update Successfully');
           }

   
           public function delete_blog_data($id){
            $data=blog::find($id);
            $data->delete();
            return redirect("/Accounts/show_blog")->with('success','Record Deleted Successfully');
            }

}
