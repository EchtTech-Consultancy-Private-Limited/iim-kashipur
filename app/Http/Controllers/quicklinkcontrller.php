<?php

namespace App\Http\Controllers;
use App\Models\quick_linkcategory;

use Illuminate\Http\Request;

class quicklinkcontrller extends Controller
{




//quick link dropdown



    public function Show_Section(){
        $data=quick_linkcategory::orderBy('id','DESC')->get();
        return view('admin.quck_link_category.show_link',['data'=>$data]);
    }

    public function Add_Section()
    {
        return view('admin.quck_link_category.add_link');

    }

    public function Add_Section_Submit(Request $request)
    {
        $request->validate([

            'short_note'=>'required|unique:quick_linkcategories',
        ]);

        $e = new quick_linkcategory();
        $e->Section=$request->title;
        $e->placement=$request->link;
        $e->short_note=$request->short_note;
        $e->short_note_h=$request->short_note_h	;
        $e->Section_h=$request->Section_h;
        $e->status=$request->status;
        $e->slug=SlugCheck('quick_linkcategories',($request->title));
        $e->save();
        return redirect('/Accounts/show_link')->with('success', 'Data Add Succesfull!!');
        }

        public function Delete_Section($id){
        $data=quick_linkcategory::find(dDecrypt($id));
        $data->delete();
        return back()->with('success', 'Data delete Succesfull!!');
        }

        public function Update_Section($id)
        {
        $data=quick_linkcategory::find(dDecrypt($id));
        return view('admin.quck_link_category.update_link',['data'=>$data]);

        }

        public function  Update_Section_Submit(Request $request,$id){

            $request->validate([
                'short_note'=>'required',
            ]);

        $file=quick_linkcategory::find(dDecrypt($id));
        $file->Section=$request->title;
        $file->placement=$request->link;
        $file->short_note=$request->short_note;
        $file->short_note_h=$request->short_note_h	;
        $file->Section_h=$request->Section_h;
        $file->status=$request->status;
        $file->slug=SlugCheck('quick_linkcategories',($request->title));
        $file->save();
        return redirect('/Accounts/show_link')->with('success', 'Data update Succesfull!!');
        }



        function add_page(){

            return view('admin.pages.add_content_page');
        }

}
