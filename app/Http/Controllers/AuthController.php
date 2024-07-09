<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Mail\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('Home.register');
    }
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
        $validate['birth_date']     = date('Y-m-d',strtotime($request->birth_date));
        

        if ($request->file('student_image')) {
            $validate['student_age']    = $age;
            $validate['year']           = date('Y');
            $validate['student_image']  = $request->file('student_image')->store('profilStudent');
        
            
            DB::beginTransaction();
            try {
                $regist = Student::create($validate);
                $detail     = [
                    'name'          => $request->student_name,
                    'age'           => $request->student_age,
                    'mother_name'   => $request->mother_name,
                    'status'        => $request->registration_status,
                    'id'            => $regist->id
                ];

                Mail::to($request->email)->send(new registration($detail));
                DB::commit();

                $message    = array(
                    'status' => true,
                    'message' => 'Data Berhasil ditambahkan'
                );
            } catch (\Throwable $th) {
                DB::rollback();
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

                return $result->registration_status == 1 ? 'Student' : "Waiting list";
            })->make(true);
    }

    public function re_registration($id)
    {
        $student = Student::find($id);

        return view('Home.re_registration', compact('student'));
    }

    public function submitRegistration(Request $request)
    {
        $validate = $request->validate([
            'payment_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($request->file('payment_image')) {

            $validate['payment_image']  = $request->file('payment_image')->store('paymentImage');
            $validate['payment_status'] = 1;

            DB::beginTransaction();

            try {
                $student    = Student::where('id',$request->id)->update($validate);

                // $data       = [
                //     'student_id'    => $student->id,
                //     'name'          => $student->name,
                //     'email'         => $student->email
                // ];

                // $data['password']   = Hash::make('Password123');
                // User::create($data);

                DB::commit();

                $message    = array(
                    'status' => true,
                    'message' => 'Data Berhasil ditambahkan'
                );
            } catch (\Throwable $th) {
                DB::rollback();
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

    public function login(Request $request)
    {

        $credentials    = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
