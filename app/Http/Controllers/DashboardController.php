<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransDevelopmentChild;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::count();
        $teacher = Teacher::count();
        return view('cms.index',compact('student','teacher'));
    }

    public function chartData()
    {
        $chartStudent          = TransDevelopmentChild::with('student')
            ->Select('student_id')
            ->groupBy('student_id')->orderBy('student_id')->get();

        $score1         = TransDevelopmentChild::with('student')
            ->Select('student_id','score', DB::raw('count(score) as total_score'))
            ->where('score',1)
            ->groupBy('student_id','score',)->orderBy('student_id')->get();

        $score3         = TransDevelopmentChild::with('student')
            ->Select('student_id','score', DB::raw('count(score) as total_score'))
            ->where('score',3)
            ->groupBy('student_id','score')->orderBy('student_id')->get();

        $score5         = TransDevelopmentChild::with('student')
            ->Select('student_id','score', DB::raw('count(score) as total_score'))
            ->where('score',5)
            ->groupBy('student_id','score')->orderBy('student_id')->get();

        $student         = [];
        $data1           = [];
        $data3           = [];
        $data5           = [];

        foreach ($chartStudent as $c) {
            $student[]    = $c->student->student_name;
        }

        foreach ($score1 as $c) {
            $data1[] = $c->total_score;
        }
        foreach ($score3 as $c) {
            $data3[] = $c->total_score;
        }
        foreach ($score5 as $c) {
            $data5[] = $c->total_score;
        }


        $chartData      = [
            'series'    => [
                [
                    'name'  => 'Kurang Baik',
                    'data'  =>$data1
                ],
                [
                    'name'  => 'Baik',
                    'data'  =>$data3
                ],
                [
                    'name'  => 'Sangat Baik',
                    'data'  =>$data5
                ]
            ],
            'categories' => $student
        ];


        return response()->json($chartData);
    }
}
