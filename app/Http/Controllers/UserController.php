<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::all();
        Return view('cms.user',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getData(){
        $result  = User::all();

        return DataTables::of($result)->addIndexColumn()
        ->addColumn('image', function ($result) {
            $image  = asset('storage/' . $result->image);
            return $image;
        })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate   = $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users',
            'role'  => 'required',
            'name'  => 'required'
        ]);

        // if ($request->file('image')) {
        //     $validate['image']  = $request->file('image')->store('profileUser');
        // }else{
        //     $message = array(
        //         'status' => false,
        //         'message' => 'Gagal upload foto'
        //     );
        // }


        $validate['password']       = Hash::make('Password123');
        $validate['personal_id']    = $request->personal_id;

        $result = User::create($validate);
        $result->assignRole($request->role);

        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil disimpan'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data gagal disimpan'
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
        $validate   = $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'role'  => 'required',
            'name'  => 'required'
        ]);

        $result = User::where('id',$id)->update($validate);

        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil disimpan'
            );
        }else{
            $message = array(
                'status' => false,
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
        $result = User::where('id',$id)->delete();
        if($result){
            $message = array(
                'status' => false,
                'message' => 'Data gagal hapus'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data gagal dihapus'
            );
        }

        echo json_encode($message);
    }
}
