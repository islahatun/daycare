<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.students');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getData(){
        $data   = Student::all();

        return DataTables::of($data)->addIndexColumn()
        ->addColumn('payment_status',function($data){
            return $data->payment_status ==1?"PAID":"NOT PAID";
        })
        ->addColumn('status', function ($data) {
            return $data->registration_status == 1?"Student":"Waiting list";
        })->make(true);

    }

    public function sentEmail($id){
        return "hai ".$id;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
