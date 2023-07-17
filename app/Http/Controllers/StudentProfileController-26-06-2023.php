<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use File;

class StudentProfileController extends Controller
{
    public function view_profile()
    {
        $student=StudentProfile::all();
        return view('admin.student-profile.show',compact('student'));
    }
    public function add_profile()
    {
        //dd("yes");
        return view('admin.student-profile.add');
    }


    public function add_student_profile(Request $request)
    {
        //dd($request->all());

        $student=new StudentProfile;
        $student->batch=$request->batch;
        $student->name=$request->name;
        $student->last_name=$request->last_name;
        $student->area_specialization=$request->area_specialization;
        $student->email=$request->email;
        $student->contact=$request->contact;
        $student->sort=$request->sort;
        $student->about=$request->about;
        $student->educational_background=$request->educational_background;
        $student->work_experience=$request->work_experience;
        $student->research_interests=$request->research_interests;

        if($request->hasfile('student_image'))
           {
            //dd("yes");
            $file = $request->file('student_image');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            //dd($filename);
            $student->student_image = $filename;
           }
        $student->save();
        return redirect()->back()->with('success','Student Profile Added Successfully');
    }

    public function show_front_profile()
    {
        $student=StudentProfile::orderBy('sort')->get();
        return view('front.Layouts.child_pages.student-profile.student-profile-front',compact('student'));
    }

    public function Child_barInnerpage($main_slug,$Sub_slug,$slug) //content page
{

//return  $slug;
//dd("yes");
    $data=child_menu::whereslug($slug)->get();

    if(Count($data)>0){
        if($data[0]->url == '/content-page')
        {
            $item=content_page::whereid($data[0]->link_option)->get();
            if(Count($item)>0){
            $type_sub=child_menu::whereslug($slug)->get();
            $gets=SubMenu::whereid($type_sub[0]->sub_id)->get();
            $get=MainMenu::whereid($type_sub[0]->menu_id)->get();
            $type_child=child_menu::whereslug($slug)->get();
            return view('front.Layouts.child_pages.menu_bar.main_menu.main_menu',['item'=>$item,'type_sub'=>$type_sub,'type_child'=>$type_child,'gets'=>$gets,'get'=>$get]);
            }else{
            return abort(401);
            }
        }
    }

       
}

    public function show_front_profile1()
    {
        $student=StudentProfile::orderBy('sort')->get();
        return view('front.Layouts.child_pages.student-profile.student-profile-front',compact('student'));
    }

    public function front_profile_show_more($id)
    {
        //$student=StudentProfile::find($id);
         $item=StudentProfile::where('id',$id)->get();
        //return $student;
        return view('front.Layouts.child_pages.student-profile.backup',compact('item'));
    }

    public function edit_student_profile($id)
    {
        $student=StudentProfile::find($id);
        return view("admin.student-profile.edit",compact('student'));
    }
    public function update_student_profile(Request $request,$id)
    {
        //dd($request->all());

        $student=StudentProfile::find($id);
        $student->batch=$request->batch;
        $student->name=$request->name;
        $student->last_name=$request->last_name;
        $student->area_specialization=$request->area_specialization;
        $student->email=$request->email;
        $student->contact=$request->contact;
        $student->sort=$request->sort;
        $student->about=$request->about;
        $student->educational_background=$request->educational_background;
        $student->work_experience=$request->work_experience;
        $student->research_interests=$request->research_interests;

        if($request->hasfile('student_image'))
           {
            //dd("yes");
            File::delete('uploads/'.$student->student_image);
            $file = $request->file('student_image');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            //dd($filename);
            $student->student_image = $filename;
           }
        $student->save();
        return redirect()->back()->with('success','Student Profile Updated Successfully');
    }


    public function delete_student_profile($id)
    {
        $student=StudentProfile::find($id);
        $student->delete();
        return redirect()->back()->with('success','Student Profile Deleted Successfully');
    }
}
