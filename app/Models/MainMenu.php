<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory;
      protected $fillable = [
        'status',
      
    ];

    function GetSubMenus(){
        return $this->hasMany(SubMenu::class,'menu_id','id');
    }

    function GetActiveSubMenu(){
        return $this->hasMany(SubMenu::class,'menu_id','id')->where('status',1);
    }

    function GetchildMenus(){
        return $this->hasMany(child_menu::class,'menu_id','id');
    }
    function GetchildsubMenus(){
        return $this->hasMany(child_menu::class,'sub_id','id');
    }

}
