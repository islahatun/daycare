<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\ActiviesChildern;

class HomeController extends Controller
{
    public function index(){
        $teacher   = Teacher::all();
        $activity  = ActiviesChildern::where('status',1)->get();
        $info      = Info::all();
        return view('Home.Index',compact('teacher','activity'));
    }
}
