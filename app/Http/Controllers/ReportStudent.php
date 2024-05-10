<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\TransDevelopmentChild;

class ReportStudent extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('cms.ReportStudent',compact('user'));
    }
    public function reportStudent(){
        $data   = TransDevelopmentChild::where('student_id',Auth::user()->student_id)->get();

        // if($data == false){
            $pdf    = PDF::loadView('report.assessmentStudent', $data);

        return $pdf->download('Report-Assesment-'.Auth::user()->student_name.'.pdf');
        // }


    }

    public function getReportAssessment(){
        $user   = Auth::user();
        $data   = TransDevelopmentChild::where('student_id',$user->student_id)->get();
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('argument',function($data){
            return $data->assessment->argument;
        })
        ->make(true);
    }
}
