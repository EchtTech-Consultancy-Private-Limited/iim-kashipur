<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class content_page extends Model
{
    use HasFactory ,SoftDeletes;


    public function search() {
        return $this->hasMany('App\Career');
    }

}
