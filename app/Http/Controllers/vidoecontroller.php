<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\video_gallery;

use App\Models\video_gallery_tittle;

use Image;

use Helper;

use File;

use Str;



class vidoecontroller extends Controller

{


    public function videodata()

    {

        $data=video_gallery::get();

        return response()->json(['data'=>$data]);

    }



    public function show_videogallery()

    {

        $gallery= video_gallery::all();

        return view('admin.video.show_video_gallery',['gallery'=>$gallery]);



    }

    public function add_videoget()

    {

        return view('admin.video.add_video_gallery');

    }

    public function add_videopost(Request $request){





        $request->validate(

            [

               'name'              =>      'required',

               'name_h'             =>      'required',

               'imagename'          =>      'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

               'bannerimage'       =>       'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'pdf'                =>       "mimes:pdf|max:10000"



            ]



        );





        $destinationPath="";

        $image = $request->file('imagename');

        if($image==null){

            $input['imagename'] ="default.jpg";

        }else{

        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('video/image');

        $img = Image::make($image->path());

        $img->resize(200,200, function ($constraint) {

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

            $Banner_destinationPath = public_path('video/banner');

            $img2 = Image::make($Banner_image->path());

            $img2->resize(1000,300, function ($constraint) {

                $constraint->aspectRatio();

            })->save($Banner_destinationPath.'/'.$input['bannerimage']);



            $Banner_image->move($Banner_destinationPath, $input['bannerimage']);

        }









        // $pdf_destinationPath="";

        // $pdf=$request->file('pdf');

        // if($pdf==null){

        //     $input['pdf'] ="default.jpg";

        // }else{

        //     $input['pdf']=time().'.'.$pdf->extension();

        //     $pdf_destinationPath = public_path('video/pdf');

        //     $pdf->move($pdf_destinationPath, $input['pdf']);

        // }









   //enter data in data base



        $e = new video_gallery ();



        $e->name=$request->name;

        $e->name_h=$request->name_h;

        $e->content=$request->content;

        $e->content_h=$request->content_h;

        $e->cover_image=$input['imagename']; //image file path

        $e->banner_image=$input['bannerimage'] ;

        // $e->file_download=$input['pdf'] ;

        $e->meta_title=$request->tittle;

        $e->meta_keywords=$request->keyword;

        $e->meta_description=$request->description ;

        $e->banner_title=$request->banner_title;

        $e->banner_alt=$request->banner_alt;

        $e->cover_title=$request->cover_title;

        $e->cover_alt=$request->cover_alt;

        $e->sort_order=$request->sort_order;

        $e->status=$request->status;

        $e->video_slug=SlugCheck('video_galleries',($request->name));

        $e->video_url=$request->url;

        if($request->hasfile('pdf'))
        {
        $img = $request->file('pdf');
        $e->pdfsize=$request->pdf->getSize();
        $name =$img->getClientOriginalName();
        $filename = time().$name;
        $img->move('video/pdf',$filename);
        $e->file_download=$filename;
        }

        $e->save();

        return redirect('/Accounts/show_videogallery')->with('success','Record Add Successfully');



    }





// video update curd





    public function update_videoget(Request $request, $id)

    {

    $value=video_gallery::find(dDecrypt($id));
    $data=video_gallery_tittle::wheregallery_id(dDecrypt($id))->get();
    return view('admin.video.updatevideogallery',['data'=>$data ,'value'=>$value]);

    }



    public function update_videopost( Request $request ,$id){

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

                $input['bannerimage']=$request->bannernameold;

                if ($request->hasFile('bannerimage')) {

                $Banner_image=$request->file('bannerimage');



               $input['bannerimage']=time().'.'.$Banner_image->extension();

               $Banner_destinationPath = public_path('video/banner');





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

                    $destinationPath = public_path('video/image');



                    $img = Image::make($image->path());

                    $img->resize(400,200, function ($constraint) {

                    $constraint->aspectRatio();

                    })->save($destinationPath.'/'.$input['imagename']);



                     $destinationPath = public_path('video/image');

                      $image->move($destinationPath, $input['imagename']);

                      }

                    //pdf update
                    // $input['pdf']=$request->pdfnameold;
                    // if ($request->hasFile('pdf')){
                    //     $u->pdfsize=$request->pdf->getSize();
                    //     $pdf=$request->file('pdf');
                    //     $input['pdf']=time().'.'.$pdf->extension();
                    //     $pdf_destinationPath = public_path('video/pdf');
                    //     $pdf_destinationPath = public_path('video/pdf');
                    //     $pdf->move($pdf_destinationPath, $input['pdf']);
                    // }






     $u=video_gallery::find(dDecrypt($id));

     $u->name=$request->name;

     $u->name_h=$request->name_h;

     $u->content=$request->content;

     $u->content_h=$request->content_h;

     $u->cover_image=$input['imagename']; //image file path

     $u->banner_image=$input['bannerimage'];

     $u->meta_title=$request->tittle;

     $u->meta_keywords=$request->keyword;

     $u->meta_description=$request->description ;

     $u->banner_title=$request->banner_title;

     $u->banner_alt=$request->banner_alt;

     $u->cover_title=$request->cover_title;

     $u->cover_alt=$request->cover_alt;

     $u->sort_order=$request->sort_order;

     $u->status=$request->status;

     $u->video_slug=SlugCheck('video_galleries',($request->name));

     $u->video_url=$request->url;

     if($request->hasfile('pdf'))
     {
     $img = $request->file('pdf');
     $u->pdfsize=$request->pdf->getSize();
     $name =$img->getClientOriginalName();
     $filename = time().$name;
     $img->move('video/pdf',$filename);
     $u->file_download=$filename;
     }

     $u->save();

     return redirect("/Accounts/show_videogallery")->with('success','Record Update Successfully');

    }





    // vidoe gallery page delete



    public function delete_vidoegallery($id){

    $data=video_gallery::find(dDecrypt($id));

    $data->delete();

    return redirect("/Accounts/show_videogallery")->with('success','Record Deleted Successfully');

    }





////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // multiple video link add

       public function multivideopost(Request $request){

        $request->validate(

            [


               'video_image'  => 'required|mimes:png,jpg,ico|max:1024',

               'video_text'   =>  'required|string|max:200',

               'order'              =>      'required',

            ]

        );


        $file= new video_gallery_tittle;

        $file->video_url=$request->url;

        $file->gallery_id=$request->gallery_id;


             $image = $request->file('video_image');

             $input['video_image'] = time().'.'.$image->extension();

             $destinationPath = public_path('video/multiple-image');


             $img = Image::make($image->path());

             $img->resize(400,200, function ($constraint) {

             $constraint->aspectRatio();

             })->save($destinationPath.'/'.$input['video_image']);


              $destinationPath = public_path('video/multiple-image');

              $image->move($destinationPath, $input['video_image']);





        $file->url=('video/multiple-image'.'/'.$input['video_image']);

        $file->video_image=$input['video_image'];

        $file->video_title=$request->video_text;

        $file->sort_order=$request->order;

        $file->status=$request->status;

        $file->slug=SlugCheck('video_gallery_tittles',($request->video_title));

        $file->save();

        return back();



      }





      //multiple video link update

       public function updatemultivideopost(Request $request,$id){

        $request->validate(

            [

            //    'video_image'  => 'required|mimes:png,jpg,ico|max:1024',

            //    'video_text'   =>  'required|string|max:200',

            //    'video_url'=>     'required',

            //    'order'  =>      'required',

            ]

        );
        $file = video_gallery_tittle::find($id);

        $file->video_url=$request->url;

        $file->gallery_id=$request->gallery_id;


        if($request->video_image)
        {
            $image = $request->file('video_image');

            $input['video_image'] = time().'.'.$image->extension();

            $destinationPath = public_path('video/multiple-image');


            $img = Image::make($image->path());

            $img->resize(400,200, function ($constraint) {

            $constraint->aspectRatio();

            })->save($destinationPath.'/'.$input['video_image']);


            $destinationPath = public_path('video/multiple-image');

            $image->move($destinationPath, $input['video_image']);


            $file->url=('video/multiple-image'.'/'.$input['video_image']);

            $file->video_image=$input['video_image'];
        }
        else
        {
          $file->video_image=$request->multioldimage;
        }



        $file->video_title=$request->video_text;

        $file->sort_order=$request->order;

        $file->status=$request->status;

        $file->slug=SlugCheck('video_gallery_tittles',($request->video_title));

        $file->save();

        return back();

       }


     // video gallery delete
    public function delete_vidoemultiplegallery($id){

    $data=video_gallery_tittle::find(dDecrypt($id));

    $data->delete();

    return back()->with('success','Record Deleted Successfully');

    }



public function video_id(Request $request)
{

    $show=video_gallery_tittle::find($request->id);

    $item=video_gallery_tittle::whereid($show->id)->first();

    return response()->json(['item'=>$item]);

}









}

