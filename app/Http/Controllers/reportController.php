<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentChild;
use PDF;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TransDevelopmentChild;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class reportController extends Controller
{
    public function index(){
        $data =  DevelopmentChild::all();

        return view('cms.report',compact('data'));
    }

    public function getStudent(Request $request){

        $data   = Student::where('validate',1)->get();
        if($request->year != null){
            $data   = Student::where('validate',1)->where('year',$request->year)->get();
        }

        return DataTables::of($data)->addIndexColumn()->make(true);

    }

    public function getTeacher(){
        $data   = Teacher::all();

        return DataTables::of($data)->addIndexColumn()
        ->addColumn('gradulation',function($data){
            return $data->graduate_of.','.$data->major.','.$data->university;
        })
        ->make(true);

    }

    public function reportTeacher(){

        $data       = [
            'content'   => Teacher::all()
        ];
        $pdf        = PDF::loadView('report.Teacher', $data);

        return $pdf->download('Report-Teacher.pdf');
    }

    public function reportStudent(Request $request){

        $data['content']   = Student::where('validate',1)->get();
        if($request->year != null){
            $data['content']   = Student::where('validate',1)->where('year',$request->year)->get();
        }

        $pdf        = PDF::loadView('report.Student', $data);


        return $pdf->download('Report-student.pdf');
        // Mengirimkan konten PDF langsung dalam respons JSON
    // return Response::json([
    //     'pdfContent' => $pdf->output(),
    // ]);

    }
}
