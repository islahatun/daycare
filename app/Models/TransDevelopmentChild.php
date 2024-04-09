<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransDevelopmentChild extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $with     = ['student'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
