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

        $studentId = Auth::user()->personal_id;
        $data = TransDevelopmentChild::with('assessment', 'student')
                ->where('student_id', $studentId)
                ->where('validasi', 1)
                ->whereIn('assessment_from', [1, 2, 3, 4, 5, 6])
                ->get()
                ->groupBy('assessment_from');

        $contents = [];

        foreach ($data as $key => $groupedData) {
            $contents[$key] = [
                'data' => $groupedData,
                'sum' => $groupedData->sum('score')
            ];
        }


$pdf = PDF::loadView('report.assessmentStudent', compact('contents'));

return $pdf->stream('Report-Assesment-'.Auth::user()->student->student_name.'.pdf');


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
