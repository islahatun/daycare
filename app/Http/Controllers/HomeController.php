<?php

namespace App\Http\Controllers;

use App\Models\ActiviesChildern;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $teacher   = Teacher::all();
        $activity  = ActiviesChildern::all();
        return view('Home.Index',compact('teacher','activity'));
    }
}
