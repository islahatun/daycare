<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roleUser   = Auth::User()->role;
        return view('cms.profile',compact('roleUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
        $validate = $request->validate([
            'student_name'  => 'required',
            'student_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'birth_date'    => 'required',
            'birth_city'    => 'required',
            'address'       => 'required',
            'mother_name'   => 'required',
            'mother_job'    => 'required',
            'father_name'   => 'required',
            'father_job'    => 'required',
            'email'         => 'required',
            'telp'          => 'required',
        ]);

        $birth_date                 = date('Y', strtotime($request->birth_date));
        $yearNow                    = date('Y');
        $age                        = $yearNow - $birth_date;


        if ($request->file('student_image')) {
            $validate['student_age']    = $age;
            $validate['student_image']  = $request->file('student_image')->store('profilStudent');


            $regist = Student::where('id',$id)->update($validate);
            if ($regist) {
                $message = array(
                    'status'  => true,
                    'message' => 'Data berhasil disimpan'
                );
            } else {
                $message = array(
                    'status'  => false,
                    'message' => 'Data gagal di simpan'
                );
            }
        } else {
            $message = array(
                'status'  => false,
                'message' => 'Gagal uplaod foto'
            );
        }

        echo json_encode($message);
    }

    public function updateUser(Request $request, string $id){
        $validate   = $request->validate([
            'password'  => 'required'
        ]);

        $result    = User::where('student_id',$id)->update($validate);
        if ($result) {
            $message = array(
                'status'  => true,
                'message' => 'Data berhasil disimpan'
            );
        } else {
            $message = array(
                'status'  => false,
                'message' => 'Data gagal disimpan'
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
