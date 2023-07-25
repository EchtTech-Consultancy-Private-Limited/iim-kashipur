<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\photo_gallery;

use App\Models\photo_gallery_image;

use Image;

use validataion;

use str;

use Helper;





class gallaycontroller extends Controller

{



//gallery ajax in dropdown

  public function photodata()

  {

      $data=photo_gallery::get();

      return response()->json(['data'=>$data]);

  }

//  gallery list show
   public function show_gallery_data_list()
    {

    $gallery= photo_gallery::all();
    return view("admin.gallary.showgalley",['gallery'=>$gallery]);

    }

//get gallery page
    function add_gallery_data_page()
    {
    return view('admin.gallary.addgallery');
    }


    public function add_gallery_data_submit(Request $request)
        {
         $request->validate(

            [

            'name'  =>      'required',

            'name_h'  =>  'required',

            'imagename'  => 'mimes:png,jpg,ico|max:1024',

            'bannerimage'=>'max:5120|mimes:png,jpg,svg|dimensions:max_width=1920,max_height=500',

            'pdf'  =>  "mimes:pdf|max:20480"

            ]


            );



            $destinationPath="";

            $image = $request->file('imagename');

            if($image==null){

                $input['imagename'] ="default.jpg";

            }else{

            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('gallery/image');

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

            $Banner_destinationPath = public_path('gallery/banner');

            $img2 = Image::make($Banner_image->path());

            $img2->resize(1000,300, function ($constraint) {

            $constraint->aspectRatio();

            })->save($Banner_destinationPath.'/'.$input['bannerimage']);



            $Banner_image->move($Banner_destinationPath, $input['bannerimage']);

            }



            // $pdf_destinationPath="";

            // $pdf=$request->file('pdf');

            // if($pdf==null){

            // $input['pdf'] ="default.jpg";

            // }else{

            // $input['pdf']=time().'.'.$pdf->extension();

            // $pdf_destinationPath = public_path('gallery/pdf');

            // $pdf->move($pdf_destinationPath, $input['pdf']);

            // }



              //enter data in data base

              $e = new photo_gallery();

              $e->name=$request->name;

              $e->name_h=$request->name_h;

              $e->content=$request->content;

              $e->content_h=$request->content_h;

              $e->cover_image=$input['imagename']; //image file path

              $e->banner_image=$input['bannerimage'] ;

            //   $e->file_download=$input['pdf'] ;

              $e->meta_title=$request->tittle;

              $e->meta_keywords=$request->keyword;

              $e->meta_description=$request->description ;

              $e->banner_title=$request->banner_title;

              $e->banner_alt=$request->banner_alt;

              $e->cover_title=$request->cover_title;

              $e->cover_alt=$request->cover_alt;

              $e->sort_order=$request->sort_order;


              $e->status=$request->status;

              $e->photo_url=$request->url;

              $e->photo_slug=SlugCheck('photo_galleries',($request->name));

              if($request->hasfile('pdf'))
              {
              $img = $request->file('pdf');
              $e->pdfsize=$request->pdf->getSize();
              $name =$img->getClientOriginalName();
              $filename = time().$name;
              $img->move('gallery/pdf',$filename);
              $e->file_download=$filename;
              }

              $e->save();

              return redirect('/Accounts/show_gallery')->with('success','Record Save Successfully');

              }





//update data  in gallery



                public function update_gallery_data($id)

                {

                $value=photo_gallery::find(dDecrypt($id));

                $data=photo_gallery_image::wheregallery_id(dDecrypt($id))->get();

                return view('admin.gallary.updategallery',['data'=>$data],['value'=>$value]);

                }



                public function update_gallery_data_submit( Request $request ,$id){


                $request->validate(

                [

                    'name'  =>      'required',

                    'name_h'  =>  'required',

                    'imagename'  => 'mimes:png,jpg,ico|max:1024',

                    'bannerimage'=>'max:5120|mimes:png,jpg,svg|dimensions:max_width=1920,max_height=500',

                    'pdf'  =>  "mimes:pdf|max:20480"


                ]

                );







                //new banner image upload

                $input['bannerimage']=$request->bannernameold;

                if ($request->hasFile('bannerimage')) {

                $Banner_image=$request->file('bannerimage');



                $input['bannerimage']=time().'.'.$Banner_image->extension();

                $Banner_destinationPath = public_path('gallery/banner');





                $img2 = Image::make($Banner_image->path());

                $img2->resize(1000,300, function ($constraint) {

                $constraint->aspectRatio();

                })->save($Banner_destinationPath.'/'.$input['bannerimage']);





                $Banner_image->move($Banner_destinationPath, $input['bannerimage']);



                }







                //new image upload

                $input['imagename']=$request->imagenameold;

                if ($request->hasFile('imagename')) {







                $image = $request->file('imagename');

                $input['imagename'] = time().'.'.$image->extension();

                $destinationPath = public_path('gallery/image');



                $img = Image::make($image->path());

                $img->resize(400,200, function ($constraint) {

                $constraint->aspectRatio();

                })->save($destinationPath.'/'.$input['imagename']);





                $image->move($destinationPath, $input['imagename']);

                }


                // //pdf update
                // $input['pdf']=$request->pdfnameold;
                // if ($request->hasFile('pdf')){
                // $u->pdfsize=$request->pdf->getSize();
                // $pdf=$request->file('pdf');
                // $input['pdf']=time().'.'.$pdf->extension();
                // $pdf_destinationPath = public_path('gallery/pdf');
                // $pdf_destinationPath = public_path('gallery/pdf');
                // $pdf->move($pdf_destinationPath, $input['pdf']);
                // }


                $u=photo_gallery::find(dDecrypt($id));

                $u->name=$request->name;

                $u->name_h=$request->name_h;

                $u->content=$request->content;

                $u->content_h=$request->content_h;

                $u->cover_image=$input['imagename']; //image file path

                $u->banner_image=$input['bannerimage'];

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

                $u->photo_url=$request->url;

                $u->photo_slug=SlugCheck('photo_galleries',($request->name));

                if($request->hasfile('pdf'))
                {
                $img = $request->file('pdf');
                $u->pdfsize=$request->pdf->getSize();
                $name =$img->getClientOriginalName();
                $filename = time().$name;
                $img->move('gallery/pdf',$filename);
                $u->file_download=$filename;
                }

                $u->save();

                return redirect("/Accounts/show_gallery")->with('success','Record Update Successfully');

                }





                //gallery page delete



                public function delete_gallery_data($id){

                $data=photo_gallery::find(dDecrypt($id));

                $data->delete();

                return redirect("/Accounts/show_gallery")->with('success','Record Deleted Successfully');

                }



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////







 //multiple data save in gallery



                      public function multiple_image_submit(Request $request)
                      {


                        $request->validate(

                            [

                            'filename'  => 'required|mimes:png,jpg,ico|max:1024',

                            'image_text'   =>  'required|string|max:200',

                            'image_alt'  =>  'required|string|max:200',



                            ]


                            );

                      $destinationPath="";

                      $image = $request->file('filename');

                      if($image==null){

                      $input['filename'] ="default.jpg";

                      }else{

                      $input['filename'] = time().'.'.$image->extension();

                      $destinationPath = public_path('gallery/multipimage');

                      $img = Image::make($image->path());

                      $img->resize(100, 100, function ($constraint) {

                      $constraint->aspectRatio();

                      })->save($destinationPath.'/'.$input['filename']);

                      $image->move($destinationPath, $input['filename']);

                      }





                      //data in database
                      $file= new photo_gallery_image();

                      $file->large_image=$input['filename'];;

                      $file->gallery_id=$request->gallery_id;

                      $file->image_title=$request->image_text;

                      $file->image_alt=$request->image_alt;

                      $file->sort_order=$request->order;

                      $file->slug=\Str::slug($request->image_title);

                      $file->status=$request->status;

                      $file->save();

                      return back()->with('success','Record save Successfully');



                      }



//multiple video link update

                      public function multi_updte_gallery_data_submit(Request $request,$id){

                   //  dd($id);


                      $add=$input['filename']=$request->multioldimage;

                      if ($request->hasFile('filename')) {

                      $image = $request->file('filename');


                      $input['filename'] = time().'.'.$image->extension();

                      $destinationPath = public_path('gallery/multipimage');



                      $img = Image::make($image->path());

                      $img->resize(400,200, function ($constraint) {

                      $constraint->aspectRatio();

                      })->save($destinationPath.'/'.$input['filename']);





                      $image->move($destinationPath, $input['filename']);

                      }

                      $file=photo_gallery_image::find($id);

                      $file->large_image=$input['filename'];;

                      $file->gallery_id=$request->gallery_id;

                      $file->image_title=$request->image_text;

                      $file->image_alt=$request->image_alt;

                      $file->sort_order=$request->order;

                      $file->status=$request->status;

                      $file->slug=\Str::slug($request->image_title);

                      $file->save();

                      return back()->with('success','Record Update Successfully');

                      }


       //gallery multiple image delete

                      public function multi_delete_image_data($id){

                      $data=photo_gallery_image::find(dDecrypt($id));

                      $data->delete();

                      return back()->with('success','Record Delele Successfully');

                      }




                      public function gallery_id(Request $request)
                      {

                          $show=photo_gallery_image::find($request->id);

                          $item=photo_gallery_image::whereid($show->id)->first();

                          return response()->json(['item'=>$item]);

                      }




  }

