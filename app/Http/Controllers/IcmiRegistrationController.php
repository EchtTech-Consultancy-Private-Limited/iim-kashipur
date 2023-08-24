<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IcmiRegistrationController extends Controller
{
    public function registeration(){

       return  view('front.Layouts.registeration');
    }
}
