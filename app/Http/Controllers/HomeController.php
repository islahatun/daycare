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

    public function indexHome(){

        $teacher   = Teacher::all();
        $activity  = ActiviesChildern::where('status',1)->get();
        $info      = Info::all();
        return view('Home.indexHome',compact('teacher','activity'));

    }

    public function about(){

        $teacher   = Teacher::all();
        $activity  = ActiviesChildern::where('status',1)->get();
        $info      = Info::all();
        return view('Home.About',compact('teacher','activity'));

    }

    public function classes(){

        $teacher   = Teacher::all();
        $activity  = ActiviesChildern::where('status',1)->get();
        $info      = Info::all();
        return view('Home.classes',compact('teacher','activity'));

    }

    public function contact(){

        $teacher   = Teacher::all();
        $activity  = ActiviesChildern::where('status',1)->get();
        $info      = Info::all();
        return view('Home.contact',compact('teacher','activity'));

    }
}
