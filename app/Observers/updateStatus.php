<?php

namespace App\Observers;

use App\Models\Student;

class updateStatus
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        $birthDate      = $student->birthdate;
        $yearBirthDate  = date('Y',strtotime($birthDate));
        $age            = date('Y') - $yearBirthDate;


        $countStudent   = Student::where('age',$age)->count();

        if($countStudent > 30){
            Student::where('id',$student)->update(['registration_status'=>0]);
        }else{
            Student::where('id',$student)->update(['registration_status'=>1]);
        }

    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}
