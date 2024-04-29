<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validate   = $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'role'  => 'required',
            'name'  => 'required'
        ]);

        $result = User::create($validate);

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
    }
}
