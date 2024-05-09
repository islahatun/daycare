<?php

namespace App\Http\Controllers;

use App\Mail\login;
use App\Models\User;
use App\Models\Student;
use App\Mail\registration;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        ->addColumn('payment_image', function ($result) {
            $image  = asset('storage/' . $result->payment_image);
            return $image;
        })
        ->addColumn('status', function ($data) {
            return $data->registration_status == 1?"Student":"Waiting list";
        })->make(true);

    }

    public function sentEmail($id){
        $student    = Student::find($id);
        $detail     = [
            'name'          => $student->student_name,
            'age'           => $student->student_age,
            'mother_name'   => $student->mother_name,
            'status'        => $student->registration_status
        ];
        Mail::to($student->email)->send(new registration($detail) );
    }

    public function validateRegis($id){
        $student    = student::find($id);
        $data       = [
                    'student_id'    => $student->id,
                    'name'          => $student->name,
                    'email'         => $student->email
                ];

                $data['password']   = Hash::make('Password123');
                $data['role']       = 'Parent';
                $user = User::create($data);
                $user->assignRole('Parent');

                $detail = [
                    'name'      => $student->name,
                    'email'     => $student->email,
                    'password'  => 'Password123'
                ];

                Mail::to($student->email)->send(new registration($detail) );
    }

    public function validateRegist($id){

        $student    = student::find($id);
        $data       = [
                    'student_id'    => $student->id,
                    'name'          => $student->student_name,
                    'email'         => $student->email
                ];

                $data['password']   = Hash::make('Password123');
                $data['role']       = 'Parent';

                $detail = [
                    'name'      => $student->name,
                    'email'     => $student->email,
                    'password'  => 'Password123'
                ];
                DB::beginTransaction();

                try {
                    // update data student
                    $student->validate  = 1;
                    $student->save();

                    $user = User::create($data);
                    $user->assignRole('Parent');

                    Mail::to($student->email)->send(new login($detail) );

                   DB::commit();
                $message    = array(
                    'status' => true,
                    'message' => 'Data berhsil terkirim'
                );
                } catch (\Throwable $th) {
                    DB::rollback();

                    $message    = array(
                        'status' => false,
                        'message' => 'Gagal mengirim data'
                    );
                }
                echo json_encode($message);


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
