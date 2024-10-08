<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentChild;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TransDevelopmentChild;

class TransDeveloperChildernController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.transDevelopmentChildern');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getDataStudent()
    {
        $result         = Student::where('validate',1);

        return DataTables::of($result)->addIndexColumn()
            ->addColumn('status', function ($data) {
                return $data->registration_status == 1 ? "Student" : "Waiting list";
            })
            ->addColumn('sad', function ($result) {
                $image  = asset('assets/img/sad.png');
                return $image;
            })
            ->addColumn('happiness', function ($result) {
                $image  = asset('assets/img/happiness.png');
                return $image;
            })
            ->addColumn('happy', function ($result) {
                $image  = asset('assets/img/happy.png');
                return $image;
            })
            ->make(true);
    }

    public function getDataAssessment($from = null,$student_id)
    {
        $data_trans     = TransDevelopmentChild::where('assessment_from', $from)->where('student_id',$student_id)->get();
        // dd($data_trans);
        if ($data_trans->isEmpty()) {
            $result     = DevelopmentChild::where('status',1)->get();
            return DataTables::of($result)->addIndexColumn()
                ->addColumn('score', function ($data) {
                    return '';
                })
                ->make(true);
        } else {
            $result     = TransDevelopmentChild::where('assessment_from', $from)->where('student_id',$student_id)->get();

            return DataTables::of($result)->addIndexColumn()
                ->addColumn('argument', function ($data) {
                    return $data->assessment->argument;
                })
                ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data   = TransDevelopmentChild::where('development_childerns_id', $request->id)->where('student_id', $request->student_id)->where('assessment_from',$request->assessment_from)->first();
        if ($data) {
            $update = [
                'student_id'                => $request->student_id,
                'development_childerns_id'  => $request->id,
                'score'                     => $request->score,
                'assessment_from'           => $request->assessment_from,
                'validasi'                  => 0
            ];

            $result = TransDevelopmentChild::where('development_childerns_id', $request->id)->where('student_id', $request->student_id)->update($update);
        } else {
            $insert = [
                'student_id'                => $request->student_id,
                'development_childerns_id'  => $request->id,
                'score'                     => $request->score,
                'assessment_from'           => $request->assessment_from
            ];

            $result = TransDevelopmentChild::create($insert);
        }


        if ($result) {
            $message = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan'
            );
        } else {
            $message = array(
                'status'    => false,
                'message'   => 'Data gagal disimpan'
            );
        }

        echo json_encode($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "data"                             => 'array',
            "data.*.student_id"                => 'requred',
            "data.*.development_childerns_id"  => 'required',
            "data.*.score"                     => 'required'
        ]);

        DB::beginTransaction();

        try {

            TransDevelopmentChild::where('student_id', $id)->delete();
            TransDevelopmentChild::insert($request->input("data"));

            DB::commit();

            $message = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan'
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            $message = array(
                'status'    => false,
                'message'   => 'Data gagal disimpan'
            );
        }


        echo json_encode($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

