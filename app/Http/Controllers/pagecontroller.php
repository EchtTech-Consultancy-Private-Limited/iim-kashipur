<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\content_page;
use App\Models\MainMenu;
use Image;
use File;
use Helper;
use validataion;
use Redirect;
class pagecontroller extends Controller
{


    public function content_pages_post(Request $request,$id){

            //dd(dDecrypt($id));
        $data=\App\Models\content_page::where('parent_id','=',dDecrypt($id))->get();

        return view('admin.pages.content_list',['data'=>$data]);

   }

    public function content_pages_list()
        {
        $data =content_page::where('parent_id',NULL)->orderBy('id','DESC')->get();
        return view('admin.pages.content_list',["data"=>$data]);
        }

        function add_content_page()
        {
        return view('admin.pages.add_content_page');
        }

        public function add_content_page_submit(Request $request){



        $request->validate(
        [
        'name'              =>        'required',
        'name_h'             =>       'required',
        'imagename'          =>       'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'bannerimage'       =>        'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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




                    $pdf_destinationPath="";
                    $pdf=$request->file('pdf');
                    if($pdf==null){
                    $input['pdf'] ="default.jpg";
                    }else{
                    $input['pdf']=time().'.'.$pdf->extension();
                    $pdf_destinationPath = public_path('page/pdf');
                    $pdf->move($pdf_destinationPath, $input['pdf']);
                    }

                    //enter data in data base


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

                    $e->delete_range=$request->delete_range;
                    $e->slug=\Str::slug($request->name);

                    if($request->parent_id != 'pages-list'  ){
                        $e->parent_id=dDecrypt($request->parent_id);
                    }else{
                        $e->parent_id= NULL;
                    }


                    $e->save();
                    return redirect("/Accounts/pages-list")->with('success', 'Data Add Succesfull!!');
                    }




                   public function update_content_page($id){
                    $data=content_page ::find(dDecrypt($id));
                    return view("admin.pages.update_content_page",['data'=>$data]);
                    }

      public function update_content_page_submit(Request $request ,$id){



            //  dd($request->all());

        $request->validate(
        [
        'name'              =>      'required',
        'name_h'             =>      'required',
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
        $Banner_destinationPath = public_path('page/banner');


        $img2 = Image::make($Banner_image->path());
        $img2->resize(1000,300, function ($constraint) {
        $constraint->aspectRatio();
        })->save($Banner_destinationPath.'/'.$input['bannerimage']);

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
            $destinationPath = public_path('page/image');


            $img = Image::make($image->path());
            $path=   $img->resize(400,200, function ($constraint) {
            $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);


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
            $pdf_destinationPath = public_path('page/pdf');

            $pdf_destinationPath = public_path('page/pdf');
            $pdf->move($pdf_destinationPath, $input['pdf']);

            }

                $u=Content_Page::find(dDecrypt($id));
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
                $u->delete_range=$request->delete_range;
                $u->parent_id=$request-> parent_id;
                $u->slug=\Str::slug($request->name);
                $u->save();
                return Redirect::to("/Accounts/pages-list")->with('success','Record Update Successfully');
                }



                public function delete_content_page($id){
                $data=content_page ::find(dDecrypt($id));
                $data->delete();
                return redirect("/Accounts/pages-list")->with('success','Record Deleted Successfully');
                }

// content page send data to ajax

public function indexdropdown()
{
$data=content_page::get();
return response()->json(['data'=>$data]);
}



// Only Archive  data show
        public function deletedata()
        {
        $data=content_page::onlyTrashed()->get();
        return view('admin.pages.Trasheddata',["data"=>$data]);
        }

        public function restored($id)
        {
        $data=content_page ::find($id);
        $data->restore();
        return view('admin.pages.content_list');
        }

        }




