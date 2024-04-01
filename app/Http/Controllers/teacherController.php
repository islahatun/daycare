<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.teacher');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getData(){
        $result  = Teacher::all();

        return DataTables::of($result)->addIndexColumn()
        ->addColumn('image', function ($result) {
            $image  = asset('storage/' . $result->image_teacher);
            return $image;
        })
            ->addColumn('graduate_of', function ($result) {
                return $result->graduate_of.",".$result->major."-".$result->university;
            })->make(true);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name_teacher'      => 'required',
            'image_teacher'     => 'required',
            'telp'              => 'required',
            'birth_date'        => 'required',
            'birth_city'        => 'required',
            'address'           => 'required',
            'graduate_of'       => 'required',
            'major'             => 'required',
            'university'        => 'required',
            'graduation_year'   => 'required'
        ]);

        if ($request->file('image_teacher')) {
            $validate['image_teacher']  = $request->file('image_teacher')->store('profileTeacher');
        }else{
            $message = array(
                'status' => false,
                'message' => 'Upload Photo failed'
            );
        }

        $result = Teacher::create($validate);
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
            'name_teacher'      => 'required',
            'image_teacher'     => 'required',
            'birth_date'        => 'required',
            'birth_city'        => 'required',
            'address'           => 'required',
            'graduate_of'       => 'required',
            'major'             => 'required',
            'university'        => 'required',
            'graduation_year'   => 'required'
        ]);

        $result = Teacher::where('id',$id)->update($validate);
        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data updated successfuly'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data updated failed'
            );
        }

        echo json_encode($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        $data   = Teacher::find($id);

        try {
        Teacher::where('id',$id)->delete();
        Storage::delete($data->image_teacher);

        DB::commit();

        $message = array(
            'status' => true,
            'message' => 'Data deleted successfuly'
        );
        } catch (\Throwable $th) {
            $message = array(
                'status' => false,
                'message' => 'Data deleted failed'
            );
        }

        echo json_encode($message);
    }
}
