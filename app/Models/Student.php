<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded  =['id'];
    protected $with     = ['transDevelopmentChildern'];

    public function transDevelopmentChildern(){
        return $this->hasMany(TransDevelopmentChild::class,'id','student_id');
    }
}
