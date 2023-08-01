<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table=('career');


    public function content_page() {
        return $this->belongsTo('App\content_page');
    }
}
