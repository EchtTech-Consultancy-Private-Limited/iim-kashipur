<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Models\audit_log;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use URL; 
use File;
use ZipArchive;

class log extends Controller
{
    public function actiondetail(Request $request)
    {
       $data=new audit_log();
       $data->user_id=Auth::guard('admin')->user()->id;
       $data->user_name=Auth::guard('admin')->user()->name;
       $data->IP_address=Auth::$request->ip();;
       $data->action_event=Auth::guard('admin')->user()->id;
       $data->datetime=date('d-m-Y');
       $data->action_event= basename(URL::current());
       $url=explode('/',URL::current());
       if(strlen($url[count($url)-1])>100){
        $data->action_event= $url[count($url)-2].'/'.dDecrypt($url[count($url)-1]);
       }
       $data->data=URL::current();
       $data->save();
       return  back();
    }

    public function datefillerdata(Request $request)
    {
        $title='Admin Dashboard ';
        //\DB::connection()->enableQueryLog();
        //$data = audit_log::whereDate('created_at',[$request->start_date, $request->end_date] )->orderBy('id','DESC')->paginate(15);
        if(!empty($request->start_date) && !empty($request->end_date)) $data = audit_log::where('created_at','>=',$request->start_date)->where('created_at','<=',$request->end_date)->orderBy('id','DESC')->paginate(15);
        elseif(!empty($request->start_date)) $data = audit_log::where('created_at','>=',$request->start_date)->orderBy('id','DESC')->paginate(15);
        elseif(!empty($request->end_date)) $data = audit_log::where('created_at','<=',$request->end_date)->orderBy('id','DESC')->paginate(15);
        else $data = audit_log::where('created_at','>=',date("Y-m-d",time()))->orderBy('id','DESC')->paginate(15);
       
        //$queries = \DB::getQueryLog();
       // dd($queries);

        if(!empty($request->start_date)) $data->appends(['start_date' => $request->start_date]);
        if(!empty($request->end_date)) $data->appends(['end_date' => $request->end_date]);
       

        return view('admin.Audit log section.Audit_data',['data'=>$data])->with(compact('title'));        
    }

       public function datefiller(Request $request)
    {
        //\DB::connection()->enableQueryLog();
      
      //dd($request->start_date.'#'.$request->end_date);
      $title='Admin Dashboard ';
      //$data = audit_log::whereDate('created_at',[$request->start_date, $request->end_date] )->orderBy('id','DESC')->paginate(15);
      if(!empty($request->start_date) && !empty($request->end_date)) $data = audit_log::where('created_at','>=',$request->start_date)->where('created_at','<=',$request->end_date)->orderBy('id','DESC')->paginate(15);
      elseif(!empty($request->start_date)) $data = audit_log::where('created_at','>=',$request->start_date)->orderBy('id','DESC')->paginate(15);
      elseif(!empty($request->end_date)) $data = audit_log::where('created_at','<=',$request->end_date)->orderBy('id','DESC')->paginate(15);
      else $data = audit_log::where('created_at','>=',date("Y-m-d",time()))->orderBy('id','DESC')->paginate(15);
      
      //$queries = \DB::getQueryLog();
  
      //dd($queries);
      if(!empty($request->start_date)) $data->appends(['start_date' => $request->start_date]);
      if(!empty($request->end_date)) $data->appends(['end_date' => $request->end_date]);

       return view('admin.Audit log section.Audit_data',['data'=>$data])->with(compact('title'));        
    }

      

            public function download_zip(Request $request)
            {
                $zip = new \ZipArchive();
                $fileName = 'zipFile.zip';  //downloads file name
                  
                if ($zip->open(public_path($fileName), \ZipArchive::CREATE)== TRUE)
                {
                    $files = File::files(public_path('banner'));
                    foreach ($files as $key => $value){
                        $relativeName = basename($value);
                        $zip->addFile($value, $relativeName);
                    }
                    $zip->close();
                }
        
                return response()->download(public_path($fileName));
            }

       
         public function fileExport(Request $request)
         { 
            if(!empty($request->start_date) && !empty($request->end_date)) $data = audit_log::where('created_at','>=',$request->start_date)->where('created_at','<=',$request->end_date)->orderBy('id','DESC')->get();
            elseif(!empty($request->start_date)) $data = audit_log::where('created_at','>=',$request->start_date)->orderBy('id','DESC')->get();
            elseif(!empty($request->end_date)) $data = audit_log::where('created_at','<=',$request->end_date)->orderBy('id','DESC')->get();
            else $data = audit_log::where('created_at','>=',date("Y-m-d",time()))->orderBy('id','DESC')->get();

            $header= ['id'=>'#','action_event'=>'1#','datetime'=>'2#','data'=>'#3', "user_id" => "10#",'user_name'=>'4#','IP_address'=>'5#','created_at'=>'6#','updated_at'=>'7#'];
       
       
           // dd($data);
            // return array_merge( $header,$data);
            $md=json_decode($data,true);
            array_unshift($md,$header);
           // dd($md);
            $todayDate  = date('Y-m-d');
            /** Create Filname and Path to Store */
            $fileName   = 'log-'.$todayDate.'.csv';
            $filePath   = public_path('uploads/'.$fileName); //I am using laravel helper, in case if your not using laravel then just add absolute or relative path as per your requirements and path to store the file
            
            /* * Just in case if I run the script multiple time 
                I want to remove the old file and add new file.
            
                And before deleting the file from the location I am making sure it exists */
            if(file_exists($filePath)){
                unlink($filePath);
            }
            $fp = fopen($filePath, 'w+');
            foreach ($md as $line) {
                fputcsv($fp, $line);
            }
            
            fclose($fp);
      
          // Excel::store($md,'excel-sheet/'.date('Y-m-d-'.time()).'.xlsx');

           return back();
    }

//table data show in ajax 

public function ajax_log_table()
{
    $data = audit_log::orderBy('id','DESC')->get();
    return  response()->json(['data'=>$data]);
}


    
}
