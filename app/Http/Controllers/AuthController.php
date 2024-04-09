<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AuthController extends Controller
{
    public function registration(Request $request)
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
            'email'         => 'required|unique:students',
            'telp'          => 'required',
        ]);

        $birth_date                 = date('Y', strtotime($request->birth_date));
        $yearNow                    = date('Y');
        $age                        = $yearNow - $birth_date;

        if ($request->file('student_image')) {
            $validate['student_age']    = $age;
            $validate['year']           = date('Y');
            $validate['student_image']  = $request->file('student_image')->store('profilStudent');


            $regist = Student::create($validate);
            if ($regist) {
                $message = array(
                    'status' => true,
                    'message' => 'Data Berhasil ditambahkan'
                );
            } else {
                $message = array(
                    'status' => false,
                    'message' => 'Data gagal ditambahkan'
                );
            }
        } else {
            $message = array(
                'status' => false,
                'message' => 'Gagal upload Foto'
            );
        }

        echo json_encode($message);
    }

    public function getDataList()
    {
        $result = Student::all();
        return DataTables::of($result)->addIndexColumn()
            ->addColumn('status', function ($result) {

                return $result->registration_status == 1?'Student':"Waiting list";
            })->make(true);
    }
}
