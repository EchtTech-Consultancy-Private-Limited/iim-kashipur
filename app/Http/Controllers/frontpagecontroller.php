<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\websitecolor;
use App\Models\content_page;
use App\Models\QuickLink;
use App\Models\video_gallery;
use App\Models\video_gallery_tittle;
use Cookie;
use Helper;
use DB;

class frontpagecontroller extends Controller
{
    public function index(){
        return view("front.Layouts.headers.index");
    }

//color change in website

      /*   public function colorchange(Request $request)
          {

             $e = new websitecolor();
             $e->color_name=$request->color;
             $e->save();
             return back();
            }*/

         public function colorshow(){
         $color=websitecolor::latest()->first();
         return response()->json([
            'status' => 'You can change this data',
            'user' => $color,

         ]);
        }




        public function colorchange(Request $request)
          {

             $color= new websitecolor();
             $color->color_name=$request->name;  // $request name jo hai vo ajax sa aya vale name ka hai
             $color->save();
             $cookie =Cookie::queue('cookiename',$request->name, 120);
             return response()->json(['Cookie set successfully.']);
             return response()->json([
                'user' => $color,
             ]);
          }

//menu

               public function menu_pageshow()
               {
                  $data=content_page::get();
                  return view('innerpage',['data'=>$data]);
               }




      function front_form(Request $request){

         $e = new Consultation();
         $e->name=$request->name;
         $e->email=$request->email;
         $e->phone=$request->phone;
         $e->website=$request->website;
         $e->message=$request->message;
         $e->save();
         return redirect('/')->with('success', 'Submited Successfull!!');;
       }




               public function content_pageshow($slug){
               $value=QuickLink ::where('title',$slug)->get('link_option');
               $data=content_page::where('id',$value[0]->link_option)->get();
               return view('innerpage',['data'=>$data]);
               }

                function show_video_category(){
                  $data=video_gallery::get();
                //  $value=DB::table('video_galleries')->where('gallery_id',$data)->join('video_gallery_tittles', 'video_gallery_tittles.gallery_id', '=', 'video_galleries.id')->get();  //two table data show karna ka leya
                  return view('video_section_category',['data'=>$data]);
                }

                function Multiple_video($id){
                 $data=video_gallery_tittle::where('gallery_id',$id)->get();
                  return view('video_section',['data'=>$data]);
                }

}
