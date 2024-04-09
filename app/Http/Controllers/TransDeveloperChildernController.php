<?php

namespace App\Http\Controllers;

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

    public function getData(){
        $result         = Student::all();

        return DataTables::of($result)->addIndexColumn()->make(true);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "data"                             => 'array',
            "data.*.student_id"                => 'requred',
            "data.*.development_childerns_id"  => 'required',
            "data.*.score"                     => 'required'
        ]);

        $result   = TransDevelopmentChild::insert($request->input("data"));
        if($result){
            $message = array(
                'status'    => true,
                'message'   => 'Data created successfully'
            );
        }else{
            $message = array(
                'status'    => false,
                'message'   => 'Data created failed'
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

            TransDevelopmentChild::where('student_id',$id)->delete();
            TransDevelopmentChild::insert($request->input("data"));

            DB::commit();

            $message = array(
                'status'    => true,
                'message'   => 'Data created successfully'
            );

        } catch (\Throwable $th) {
            DB::rollBack();

            $message = array(
                'status'    => false,
                'message'   => 'Data created failed'
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
