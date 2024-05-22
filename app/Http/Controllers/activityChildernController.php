<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActiviesChildern;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class activityChildernController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.activityChildern');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getData(){
        $result  = ActiviesChildern::all();

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
        $validate = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'image'         => 'required',
            'date'          => 'required',
            'status'        => 'required'
        ]);

        if ($request->file('image')) {
            $validate['image']  = $request->file('image')->store('activityImage');
        }else{
            $message = array(
                'status' => false,
                'message' => 'Gagal upload foto'
            );
        }

        $result = ActiviesChildern::create($validate);
        if($result){
            $message = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan'
            );
        }else{
            $message = array(
                'status'    => false,
                'message'   => 'Data gagal disimpan'
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
    public function update(Request $request, string $id=null)
    {
        $validate = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'date'          => 'required',
            'status'        => 'required'
        ]);

        if ($request->file('image')) {
            $data   = ActiviesChildern::find($request->id);
            Storage::disk('public')->delete($data->image);
            $validate['image']  = $request->file('image')->store('activityImage');
        }else{
            $message = array(
                'status' => false,
                'message' => 'Gagal upalod Foto'
            );
        }

        $result = ActiviesChildern::where('id',$request->id)->update($validate);
        if($result){
            $message = array(
                'status'    => true,
                'message'   => 'Data berhasil disimpan'
            );
        }else{
            $message = array(
                'status'    => false,
                'message'   => 'Data gagal disimpan'
            );
        }

        echo json_encode($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data   = ActiviesChildern::find($id);
        Storage::disk('public')->delete($data->image);

        $result = ActiviesChildern::where('id',$id)->delete();
        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data berhasil dihapus'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data gagal di hapus'
            );
        }

        echo json_encode($message);
    }
}
