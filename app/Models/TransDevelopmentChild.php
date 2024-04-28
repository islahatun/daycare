<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransDevelopmentChild extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with     = ['student','assessment'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function assessment()
    {
        return $this->belongsTo(DevelopmentChild::class, 'development_childerns_id', 'id');
    }
}
