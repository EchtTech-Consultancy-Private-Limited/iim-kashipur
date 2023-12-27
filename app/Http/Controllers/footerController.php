<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainMenu;
use App\Models\SubMenu;
use App\Models\child_menu;
use App\Models\QuickLink;
use App\Models\content_page;
use App\Models\photo_gallery;
use App\Models\video_gallery;
use App\Models\video_gallery_tittle;
use App\Models\feedback;
use App\Models\StudentProfile;
use App\Models\photo_gallery_image;
use App\Models\OrganisationStructure;
use App\Models\multiple_profile;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Trunc;
use PHPUnit\Framework\Constraint\Count;
use App\Models\club;
use App\Models\cell;
use App\Models\commmittee;
use App\Models\Department;
use App\Models\org_journies;
use App\Models\club_multiple_image;
use App\Models\committee_multiple_image;
use App\Models\cell_multiple_image;
use App\Models\press_media;
use App\Models\news_event;
use App\Models\subchildmenu;
use App\Models\Tender;
use App\Models\Vendorsdebarred;
use App\Models\Career;
use App\Models\Events;
use App\Models\event_image;
use App\Models\Industry;
use App\Models\student_council;
use App\Models\journal_publication;
use App\Models\journal_publication_child;
use App\Models\anti_raggings;
use App\Models\wellness_facilitie;
use App\Models\wellness_facilitie_image;
use App\Models\rti;
use App\Models\rit_report_section;
use App\Models\quarter_report;
use App\Models\BannerSlider;
use App\Models\Org;
use App\Models\project_logo;
use App\Models\quick_linkcategory;
use App\Models\search;


class footerController extends Controller
{



//add-edit-ANTI-RAGGING
  public function Show_antiRagging($id){
    $data=anti_raggings::find(dDecrypt($id))->first();
    $data=anti_raggings::where('id',$data->id)->first();
    return view('admin.sections.view_antiragging',['data'=>$data]);
}


  public function View_antiRagging()
{
    $data=\App\Models\anti_raggings::get();
    return view('admin.sections.mange_ANTI_RAGGING',['data'=>$data]);
}

public function Add_Edit_antiRagging(Request $request,$id=null)
{

    if($id){
        $title="Edit Anti Ragging Section";
        $msg="Anti Ragging Edited Successfully!";
        $data=anti_raggings::find(dDecrypt($id));
    }
    else{
        $title="Add Anti Ragging Section";
        $msg="Anti Ragging Added Successfully!";
        $data=new anti_raggings;

        //child journal_publication_child
    }

        if($request->isMethod('post')){
            if(!$id){
               $request->validate([
                'title'=>'required|unique:anti_raggings',
                "pdf" => "mimes:pdf|max:10000"

              ]);}
            else{
            $request->validate([
                'title'=>'required',
                "pdf"  =>  "mimes:pdf|max:10000"
            ]);
        }


        $data->status=$request->status;
        $data->title=$request->title;

        $path=public_path('uploads/pdf');
        if($request->hasFile('pdf')){
            $data->pdfsize=$request->pdf->getSize();
            $file=$request->file('pdf');
            $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->pdf= $newname;
        }
        $data->save();
        return redirect('/Accounts/ANTI-RAGGING')->with('success',$msg);
    }
    return view('admin.sections.add_ANTI_RAGGING',compact('data','title','id'));

}

    public function Delte_antiRagging($id){
    $data=anti_raggings::find(dDecrypt($id));
    $data->delete();
     return redirect()->back()->with('success','Anti Ragging deleted Successfully');
  }



//tender
public function Show_tender($id){
    $data=Tender::find(dDecrypt($id))->first();
    $data=Tender::where('id',$data->id)->first();
    return view('admin.sections.view_tender',['data'=>$data]);
}


public function View_tender()
    {
        $tender=Tender::orderBy('id')->get();
        return view('admin.sections.tendersadd',['tender'=>$tender]);
    }

public function Add_Edit_tender(Request $request,$id=null)
    {

if($id){
    $title="Edit Tender Details";
    $msg="Tender Details Edited Successfully!";
    $tender=Tender::find(dDecrypt($id));


}
else{

      $title="Add Tender Details";
      $msg="Tender Details Added Successfully!";
      $tender=new Tender;

}


if($request->isMethod('post')){
    if($id){
    $request->validate([

        'title'=>'required',
        "tender_document"   =>   "mimes:pdf|max:10000"

    ]);
    }
    else{
            $request->validate([
        'title'=>'required',
        'title'=>'required|unique:tenders',
        "tender_document"   =>   "mimes:pdf|max:10000"

    ]);
    }
        $tender->published_date=$request->published_date;
        $tender->submission_date=$request->submission_date;
        $tender->title=$request->title;
        $tender->archive_date=$request->archive_date;

        if($request->hasFile('tender_document')){
            $tender->pdfsize=$request->tender_document->getSize();
            $file=$request->file('tender_document');
            $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $path=public_path('uploads/tenders');
            $file->move($path,$newname);
        $tender->tender_document=$newname;
        }


        if($request->hasFile('Corrigendum_Documents')){
            $tender->Corrigendum_pdfsize=$request->Corrigendum_Documents->getSize();
            $file=$request->file('Corrigendum_Documents');
            $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $path=public_path('uploads/tenders');
            $file->move($path,$newname);
           $tender->Corrigendum_Documents=$newname;
        }


        // $tender->corrigendum=$request->corrigendum;
        $tender->status=$request->status;
        $tender->save();
    return redirect()->route('admin.viewtenders')->with('success',$msg);
}
return view('admin.sections.tendors',compact('tender','title','id'));
}

public function Delete_tender($id){

    $exit = Tender::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        Tender::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');
}



//vendord
public function Show_vender($id){
    $data=Vendorsdebarred::find(dDecrypt($id))->first();
    $data=Vendorsdebarred::where('id',$data->id)->first();
    return view('admin.sections.view_vendor',['data'=>$data]);
}

public function View_vendor()
    {
        $vendordebarred=Vendorsdebarred::orderBy('id')->get();
        return view('admin.sections.vendorsdebarredmanage',['vendordebarred'=>$vendordebarred]);
    }

public function Add_Edit_vendor(Request $request,$id=null)
    {

if($id){
    $title="Edit Details";
    $msg="Tender Details Edited Successfully!";
    $vendorsdebarred=Vendorsdebarred::find(dDecrypt($id));


}
else{

      $title="Add Details";
      $msg="Details Added Successfully!";
      $vendorsdebarred=new Vendorsdebarred;
    //  dd($request->all());
}


    if($request->isMethod('post')){
        if($id){
        $request->validate([

            'vendor_name'=>'required',
            "related_document"   =>   "mimes:pdf|max:10000"

        ]);
        }
        else{
            $request->validate([

            'vendor_name'=>'required|unique:vendorsdebarred',
            "related_document"   =>   "mimes:pdf|max:10000"

        ]);
        }


        $vendorsdebarred->vendor_name=$request->vendor_name;
        $vendorsdebarred->archive_date=$request->archive_date;

        if($request->hasFile('related_document')){
            $vendorsdebarred->pdfsize=$request->related_document->getSize();
            $file=$request->file('related_document');
            $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $path=public_path('uploads/vendorsdebarred');
            $file->move($path,$newname);
        $vendorsdebarred->related_document=$newname;
        }
        $vendorsdebarred->status=$request->status;
        $vendorsdebarred->save();

    return redirect()->route('admin.vendordebarred')->with('success',$msg);
}
return view('admin.sections.editvendor',compact('vendorsdebarred','title','id'));
}

public function Delete_vendor($id){

    $exit = Vendorsdebarred::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        Vendorsdebarred::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');


}


//career
public function Show_career($id){
    $data=Career::find(dDecrypt($id))->first();
    $data=Career::where('id',$data->id)->first();
    return view('admin.sections.view_carrer',['data'=>$data]);
}


public function View_Career()
    {
        $career=Career::orderBy('id')->get();
        return view('admin.sections.managecareer',['career'=>$career]);
    }

    public function Add_Edit_Career(Request $request,$id=null)
    {



    if($id){
        $title="Edit Details";
        $msg="Details Edited Successfully!";
        $career=Career::find(dDecrypt($id));
    }
    else{
      $title="Add Details";
      $msg="Details Added Successfully!";
      $career=new Career;
    }
    if($request->isMethod('post')){
        if($id){
        $request->validate([
            'name_of_the_post'=>'required','unique: career',
            "detail_advertisement"   =>   "mimes:pdf|max:10000",
            "corrigendum"   =>   "mimes:pdf|max:10000"

        ]);
        }
        else{
            $request->validate([
            'name_of_the_post'=>'required',
            "detail_advertisement"   =>   "mimes:pdf|max:10000",
            "corrigendum"   =>   "mimes:pdf|max:10000"

        ]);
    }
        $career->name_of_the_post=$request->name_of_the_post;
        if($request->hasFile('detail_advertisement')){
            $career->pdfsize=$request->detail_advertisement->getSize();
            $file=$request->file('detail_advertisement');
            $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $path=public_path('uploads/fo');
            $file->move($path,$newname);
        $career->detail_advertisement=$newname;
        }

        if($request->hasFile('corrigendum')){
            $career->pdf_corrigendum=$request->corrigendum->getSize();
            $file=$request->file('corrigendum');
            $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
            $path=public_path('uploads/fo');
            $file->move($path,$newname);
        $career->corrigendum=$newname;
        }

        $career->note=$request->note;
        $career->opening_date=$request->opening_date;
        $career->archive_date=$request->archive_date;
        $career->closing_date=$request->closing_date;
        $career->online_link=$request->online_link;
        $career->external=$request->external;

        $career->status=$request->status;
        $career->save();

    return redirect()->route('admin.careershow')->with('success',$msg);
}

return view('admin.sections.careers',compact('career','title','id'));
}

public function Delete_Career($id){

    $exit = Career::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        Career::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');

}



//Rit
public function Show_RTI($id){
    $data=rti::find(dDecrypt($id))->first();
    $data=rti::where('id',$data->id)->first();
    return view('admin.sections.view_rit',['data'=>$data]);
}

public function view_RTI(){
    $data=rti:: orderBy('id')->get();
    return view('admin.sections.manage_RTI',['data'=>$data]);

    }
    public function Add_Edit_RTI(Request $request,$id=NULL)
    {

        if($id){
            $title="Edit Rti Details";
            $msg="Rti Details Edited Successfully!";
            $data=rti::find(dDecrypt($id));
        }
        else{

              $title="Add Rti Details";
              $msg="Rti Details Added Successfully!";
              $data=new rti;
        }



            if($request->isMethod('post')){
                if($id){
                $request->validate([
                    "pdf" => "mimes:pdf|max:10000",
                    'title'=>'required',

                ]);
                }
                else{
                     $request->validate([
                        "pdf" => "mimes:pdf|max:10000",
                     'title'=>'required|unique:rtis',

                ]);
            }


            $data->title=$request->title;
            $data->CPIO=$request->CPIO;
            $data->Authority=$request->Authority;
            $data->archive_date=$request->archive_date;
            $data->status=$request->status;
            $path=public_path('uploads/rti');
            if($request->hasFile('pdf')){
                $data->pdfsize=$request->pdf->getSize();
                $file=$request->file('pdf');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf= $newname;
            }
            $data->save();
           return redirect('Accounts/RTI')->with('success',$msg);
        }
        return view('admin.sections.add_RTI',compact('data','title','id'));
        }

        function delete_RTI($id){
            rti::find(dDecrypt($id))->delete();
            return redirect()->back()->with('success','committee deleted Successfully');
        }


    //rit section 2
        public function view_AnnualAudit_RTI(){

        $data=rit_report_section::get();
        return view ('admin.sections.manage_rti_section',['data'=>$data]);
        }

        public function Add_AnnualAudit_RTI(Request $request)
        {
            $request->validate(
                [
                // "filename"   => "mimes:pdf|max:10000",
                // 'title'=>'required|unique:rit_report_sections',
                ]
            );

            $data=New rit_report_section;
            $data->title= $request->text;
            $data->Quarterly_section= $request->Quarterly_section;
            $data->status= $request->status;
            $data->archive_date=$request->archive_date;

            $path=public_path('uploads/rti/');
            if($request->hasFile('filename')){
                $data->pdfsize=$request->filename->getSize();
                $file=$request->file('filename');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf= $newname;
            }
            $data->save();
            return back()->with('success','Record Add Successfully');

        }

        public function Edit_AnnualAudit_RTI(Request $request,$id)
        {
            $request->validate(
                [
                 "filename"   =>   "mimes:pdf|max:10000"
                ]
               );
            $data=rit_report_section::find($id);
            $data->title= $request->text;
            $data->Quarterly_section= $request->Quarterly_section;
            $data->Quarterly_type= $request->Quarterly_type;
            $data->status= $request->status;
            $data->archive_date=$request->archive_date;

            $path=public_path('uploads/rti/');
            if($request->hasFile('filename')){
                $data->pdfsize=$request->filename->getSize();
                $file=$request->file('filename');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf= $newname;
            }
            $data->save();
            return back()->with('success','Record Edit Successfully');

        }

        public function Delete_AnnualAudit_RTI($id)
        {
            rit_report_section::find(dDecrypt($id))->delete();
            return redirect()->back()->with('success','Rti deleted Successfully');
        }



        //QUARTER section  3
        public function view_Quarter_RTI()
        {
        $data=quarter_report::get();
        return view ('admin.sections.manageQuarterly',['data'=>$data]);
        }

        public function Add_Quarter_RTI(Request $request)
        {
            //dd($request->all());

            $request->validate(
                [
                    "QUARTER_pdf1"            =>          "mimes:pdf|max:10000",
                    "QUARTER_pdf2"            =>          "mimes:pdf|max:10000",
                    "QUARTER_pdf3"            =>          "mimes:pdf|max:10000",
                    "QUARTER_pdf4"            =>          "mimes:pdf|max:10000",
                    'year'                     =>          'required|unique:quarter_reports'
                ]
               );

            $data=New quarter_report;
            $data->status= $request->status;
            $data->year= $request->year;
            $data->archive_date=$request->archive_date;

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf1')){
                $data->pdfsize_first=$request->QUARTER_pdf1->getSize();
                $file=$request->file('QUARTER_pdf1');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_first= $newname;
            }

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf2')){
                $data->pdfsize_second=$request->QUARTER_pdf2->getSize();
                $file=$request->file('QUARTER_pdf2');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_second= $newname;
            }

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf3')){
                $data->pdfsize_third=$request->QUARTER_pdf3->getSize();
                $file=$request->file('QUARTER_pdf3');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_third= $newname;
            }

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf4')){
                $data->pdfsize_fourth=$request->QUARTER_pdf4->getSize();
                $file=$request->file('QUARTER_pdf4');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_fourth = $newname;
            }
            $data->save();
            return back()->with('success','Record Add Successfully!!!!!!!!');

        }

        public function Edit_Quarter_RTI(Request $request,$id)
        {
                 //dd($request->all());

            $request->validate(
                [

                    "QUARTER_pdf1"            =>          "mimes:pdf|max:10000",
                    "QUARTER_pdf2"            =>          "mimes:pdf|max:10000",
                    "QUARTER_pdf3"            =>          "mimes:pdf|max:10000",
                    "QUARTER_pdf4"            =>          "mimes:pdf|max:10000",
                    'year'                     =>          'required'

                ]
               );
            $data=quarter_report::find($id);
            $data->status= $request->status;
            $data->year= $request->year;
            $data->archive_date=$request->archive_date;

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf1')){
                $data->pdfsize_first=$request->QUARTER_pdf1->getSize();
                $file=$request->file('QUARTER_pdf1');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_first= $newname;
            }

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf2')){
                $data->pdfsize_second=$request->QUARTER_pdf2->getSize();
                $file=$request->file('QUARTER_pdf2');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_second= $newname;
            }

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf3')){
                $data->pdfsize_third=$request->QUARTER_pdf3->getSize();
                $file=$request->file('QUARTER_pdf3');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_third= $newname;
            }

            $path=public_path('uploads/rti/');
            if($request->hasFile('QUARTER_pdf4')){
                $data->pdfsize_fourth=$request->QUARTER_pdf4->getSize();
                $file=$request->file('QUARTER_pdf4');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf_fourth = $newname;
            }

            $data->save();
            return back()->with('success','Record Edit Successfully!!!!!!!');

        }

        public function Delete_Quarter_RTI($id)
        {
            quarter_report::find(dDecrypt($id))->delete();
            return redirect()->back()->with('success','Quarterly Rt deleted Successfully');
        }


//press media
public function Show_PressMedia($id){
    $profile=OrganisationStructure::get();
    $data=press_media::find(dDecrypt($id))->first();
    $data=press_media::where('id',$data->id)->first();
    return view('admin.sections.view_press_media',['data'=>$data,'profile'=>$profile]);
}


function View_PressMedia(){
    $data=press_media::orderBy('id','DESC')->cursor();
    return view('admin.sections.managePressMedia',compact('data'));
    }

    function Add_Edit_PressMedia(Request $request,$id=null){
        $profile=OrganisationStructure::get();
        if($id){
            $title="Edit Press & Media";
            $data= press_media::find(dDecrypt($id));
            $msg="Press & Media Edited Successfully";
        }
        else{
            $title="Add Press & Media";
            $data=new  press_media;
            $msg="Press & Media Added Successfully";
        }

        if($request->isMethod('post')){
            if($id){
            $request->validate([
                'heading'=>'required',
                'heading_h'=>'required',
                "file"   =>  "mimes:pdf|max:10000"
            ]);
            }
            else{
                 $request->validate([
                    'heading'=>'required|unique:press_medias',
                    'heading_h'=>'required',
                    "file"  => "mimes:pdf|max:10000"
            ]);
            }
            $data->heading=$request->heading;
            $data->heading_h=$request->heading_h;
            $data->media_publication=$request->media_publication;
            $data->publishing_link=$request->publishing_link;
            $data->slug=SlugCheck('news_events',($request->heading));
            $data->chairperson=$request->chairperson;
            $data->status=$request->status;
            $data->external=$request->external;
            $data->archive_date=$request->archive_date;


            if($request->hasFile('file')){
                $path=public_path('uploads/prss_medias');
                $file=$request->file('file');
                $newname= time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->pdf= $newname;
            }
            $data->save();
            return redirect('/Accounts/press-media')->with('success',$msg);
        }
        return view('admin.sections.addPressMedia',compact('data','id','title','profile'));
    }

    public function Delete_pressMedia($id){

    $exit = press_media::where('id',dDecrypt($id))->first();
    if(!empty($exit)){
        press_media::find(dDecrypt($id))->delete();
    }else{
        return back()->with('error','You are trying to perform unethical process. Your requst is failed.');
    }
    return redirect()->back()->with('success','Record Deleted Successfully');

    }

    //ajax
    public function rit_QUARTER(Request $request){

        $item=rit_report_section::whereid($request->id)->first();
        return response()->json(['item'=>$item]);
    }

    public function rti_QUARTER_data(Request $request){

        $item=quarter_report::whereid($request->id)->first();
        return response()->json(['item'=>$item]);
    }
    
    
}
