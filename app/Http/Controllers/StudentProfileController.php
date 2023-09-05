<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\StudentType;
use File;
use DB;

class StudentProfileController extends Controller
{
    public function view_profile()
    {
        $student1=StudentProfile::all();

        $student=DB::table('student_profiles')
        ->select('student_profiles.*', 'student_type.student_type as student_type')
        ->leftJoin('student_type', 'student_profiles.batch', '=', 'student_type.id')
        ->get();
        //return $data;
        return view('admin.student-profile.show',compact('student'));
    }

     public function view_profile_type()
    {
        $student=StudentType::all();
        //return $student;
        return view('admin.student-profile.view-student-type',compact('student'));
    }

     public function add_student_type()
    {
        $student=StudentType::all();
        return view('admin.student-profile.student-type',compact('student'));
    }

    public function add_profile()
    {
        //dd("yes");
        $student=StudentType::all();
        return view('admin.student-profile.add',compact('student'));
    }

     public function add_student_type_form(Request $request)
    {
        //dd($request->all());

        $student=new StudentType;
        $student->student_type=$request->student_type;
        $student->save();
        return redirect()->back()->with('success','Student Profile Type Added Successfully');
    }


    public function add_student_profile(Request $request)
    {

        $request->validate([

            'student_image'=>'required|mimes:jpg,jpeg,gif,png',
            'email' => ['required','unique:student_profiles','string','email','max:50','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],

        ]);

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
        return redirect('Accounts/Manage-students-profile')->with('success','Student Profile Added Successfully');
    }

    public function show_front_profile()
    {
        $student=StudentProfile::orderBy('sort')->get();
        return view('front.Layouts.child_pages.student-profile.student-profile-front',compact('student'));
    }



    public function show_front_profile1()
    {
        $student=StudentProfile::orderBy('sort')->get();
        return view('front.Layouts.child_pages.student-profile.student-profile-front1',compact('student'));
    }

    public function front_profile_show_more($id)
    {
         $item=StudentProfile::where('id',$id)->get();
        //return $student;
        return view('front.Layouts.child_pages.student-profile.backup',compact('item'));
    }

    public function edit_student_profile($id)
    {
        $student=StudentProfile::find(dDecrypt($id));
        $studentlist=StudentType::all();


        return view("admin.student-profile.edit",compact('student','studentlist'));
    }
    public function update_student_profile(Request $request,$id)
    {
        $request->validate([

        'student_image'=>'mimes:jpg,jpeg,gif,png',
        'email' => ['string','email','max:50','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],


        ]);

        $student=StudentProfile::find(dDecrypt($id));
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
        $student->papers_publications=$request->papers_publications;
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
        $student=StudentProfile::find(dDecrypt($id));
        $student->delete();
        return redirect()->back()->with('success','Student Profile Deleted Successfully');
    }

    public function edit_student_profile_type($id)
    {
        $student=StudentType::find(dDecrypt($id));
        return view("admin.student-profile.edit-student-type",compact('student'));
    }
    public function update_student_profile_type(Request $request,$id)
    {
        //dd($request->all());

        $student=StudentType::find(dDecrypt($id));
        $student->student_type=$request->student_type;
        $student->save();
        return redirect()->back()->with('success','Student Profile Updated Successfully');
    }

      public function delete_student_profile_type($id)
    {
        $student=StudentType::find(dDecrypt($id));
        $student->delete();
        return redirect()->back()->with('success','Student Profile Type Deleted Successfully');
    }
}
