<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class URLList extends Model
{
    use HasFactory;
     protected $fillable = [
        'url',
        'table_name',
        'type',
    ];
}
