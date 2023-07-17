<?php

namespace App\Http\Controllers;
use App\Models\quick_linkcategory;

use Illuminate\Http\Request;

class quicklinkcontrller extends Controller
{
 



//quick link dropdown


    public function add_link()
    {
        return view('admin.quck_link_category.add_link');
       
    }

    public function show_link()
     {    
        $data=quick_linkcategory::all();
        return view('admin.quck_link_category.show_link',['data'=>$data]);
       
    }
    function add_page(){
       
        return view('admin.pages.add_content_page');
    }



    public function add_link_action(Request $request)
    {
       
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
        
            public function delete_link($id){
            $data=quick_linkcategory::find($id);
            $data->delete();
            return back()->with('success', 'Data delete Succesfull!!');
            }

            public function update_link($id)
            {    
            $data=quick_linkcategory::find($id);
            return view('admin.quck_link_category.update_link',['data'=>$data]);

            }

           
                
                    public function update_linkpost(Request $request,$id){
                       
                   
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



}
