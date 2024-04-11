<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class reportController extends Controller
{
    public function index(){
        return view('cms.report');
    }

    public function getStudent(Request $request){

        $data   = Student::where('validate',1)->get();
        if($request->year != null){
            $data   = Student::where('validate',1)->where('year',$request->year)->get();
        }

        return DataTables::of($data)->addIndexColumn()->make(true);

    }

    public function reportTeacher(){
        $data = [
            'title' => 'Contoh PDF dengan Laravel',
            'content' => 'Ini adalah contoh dokumen PDF yang dihasilkan menggunakan DOMPDF di Laravel.'
        ];

        $pdf = PDF::loadView('report.teacher', $data);

        return $pdf->download('example.pdf');
    }
}
