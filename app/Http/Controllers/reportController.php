<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class reportController extends Controller
{
    public function index(){
        return view('cms.report');
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
