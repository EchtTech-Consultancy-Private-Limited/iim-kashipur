<?php

namespace App\Exports;

use App\Models\guidelinesparticipant;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportguidelinesparticipant implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return guidelinesparticipant::all();
    }
}
