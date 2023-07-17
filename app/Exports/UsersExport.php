<?php

namespace App\Exports;

use App\Models\audit_log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $yesterday = date('d-m-Y',time()-60*60*24*1);
        $data= audit_log::where('datetime',$yesterday)->get();
        //$header=['id','user_name','datetime','data','user_id','IP_address','action_event'];
       
         return $data;
    }
}
