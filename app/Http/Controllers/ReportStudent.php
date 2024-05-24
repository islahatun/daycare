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

        set_time_limit(300);

        $data = [
            'content1'  => TransDevelopmentChild::with('assessment','student')
                            ->where('student_id',Auth::user()->personal_id)
                            ->where('assessment_from',1)
                            ->where('validasi',1)
                            ->get(),
            'content2'  => TransDevelopmentChild::with('assessment','student')
                            ->where('student_id',Auth::user()->personal_id)
                            ->where('assessment_from',2)
                            ->where('validasi',1)
                            ->get(),
            'content3'  => TransDevelopmentChild::with('assessment','student')
                            ->where('student_id',Auth::user()->personal_id)
                            ->where('assessment_from',3)
                            ->where('validasi',1)
                            ->get(),
            'content4'   =>TransDevelopmentChild::with('assessment','student')
                            ->where('student_id',Auth::user()->personal_id)
                            ->where('assessment_from',4)
                            ->where('validasi',1)
                            ->get(),
            'content5'   =>TransDevelopmentChild::with('assessment','student')
                            ->where('student_id',Auth::user()->personal_id)
                            ->where('assessment_from',5)
                            ->where('validasi',1)
                            ->get(),
            'content6'   =>TransDevelopmentChild::with('assessment','student')
                            ->where('student_id',Auth::user()->personal_id)
                            ->where('assessment_from',6)
                            ->where('validasi',1)
                            ->get(),

        ];
        // if($data == false){
            $pdf    = PDF::loadView('report.assessmentStudent', $data);

        return $pdf->download('Report-Assesment-'.Auth::user()->student_name.'.pdf');
        // }

    }

    public function getReportAssessment(Request $request){
        $user   = Auth::user();
        $data   = TransDevelopmentChild::where('student_id',$user->personal_id)
        ->where('validasi',1)
        ->where('assessment_from',$request->assessment)
        ->get();
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('argument',function($data){
            return $data->assessment->argument;
        })
        ->make(true);
    }
}
