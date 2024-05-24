<?php

namespace App\Http\Controllers;

use App\Models\TransDevelopmentChild;
use Illuminate\Http\Request;

class validateAssessmentController extends Controller
{
    public function index()
    {
        return view('cms.validateAssessment');
    }

    public function validateAssessment(Request $request)
    {
        $data   = [
            'validasi' => 1
        ];
        $result = TransDevelopmentChild::where('student_id',$request->student_id)->where('assessment_from',$request->assessment)->update($data);

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
}