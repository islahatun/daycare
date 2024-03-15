<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registration(Request $request)
    {
        $validate = $request->validate([
            'student_name'  => 'required',
            'student_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'birth_date'    => 'required',
            'birth_city'    => 'required',
            'address'       => 'required',
            'mother_name'   => 'required',
            'mother_job'    => 'required',
            'father_name'   => 'required',
            'father_job'    => 'required',
            'email'         => 'required|unique:students',
            'telp'          => 'required',
        ]);

        if($request->file('student_image')){
            $validate['student_image'] = $request->file('student_image')->store('profilStudent');
            $regist = Student::create($validate);
            if($regist){
                $message = array(
                    'status' => true,
                    'message' => 'Data Berhasil ditambahkan'
                );
            }else{
                $message = array(
                    'status' => false,
                    'message' => 'Data gagal ditambahkan'
                );
            }
        }else{
            $message = array(
                'status' => false,
                'message' => 'Gagal upload Foto'
            );
        }

        echo json_encode($message);
    }
}
