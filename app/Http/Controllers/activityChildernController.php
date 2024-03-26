<?php

namespace App\Http\Controllers;

use App\Models\ActiviesChildern;
use Illuminate\Http\Request;

class activityChildernController extends Controller
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
        $validate = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'image'         => 'required',
            'date'          => 'required'
        ]);

        $result = ActiviesChildern::create($validate);
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
        $validate = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'image'         => 'required',
            'date'          => 'required'
        ]);

        $result = ActiviesChildern::where('id',$id)->update($validate);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = ActiviesChildern::where('id',$id)->delete();
        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data deleted successfuly'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data deleted failed'
            );
        }

        echo json_encode($message);
    }
}
