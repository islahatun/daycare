<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DevelopmentChild;
use Yajra\DataTables\DataTables;
use App\Http\Requests\DevelopmentChildernRequest;


class developmentChildernController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.DevelopmentChildern');
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
            'argument'  => 'required'
        ]);

        $result     = DevelopmentChild::create($validate);

        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data added successfully'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data added failed'
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

    public function getData(){
        $result = DevelopmentChild::all();

        return DataTables::of($result)->addIndexColumn()->make(true);
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
    public function update(DevelopmentChildernRequest $request, string $id)
    {
        $validate   = $request->validate();

        if($validate){
            $result     = DevelopmentChild::where('id',$id)->update([$request->argument]);
        }

        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data update successfully'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data update failed'
            );
        }

        echo json_encode($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result     = DevelopmentChild::where('id',$id)->delete();

        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data deleted successfully'
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
