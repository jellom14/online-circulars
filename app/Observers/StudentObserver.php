<?php

namespace App\Observers;

use App\Models\StaffLog;
use App\Models\Student;
use App\Models\StudentLog;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        //
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
    public function creating(Student $student) : void {
        

        $student->userscreate()->associate(2); 

    }

    public function updating(Student $student) : void {

        
        $student->usersupdate()->associate(2);

    }

    public function deleting(Student $student) : void {
       
        $student->usersdelete()->associate(2);
        $student->save();

    }

    public function retrieved(Student $student) : void {

        $id = $student->id;
        
        //create logs for studentlogs
        $studentlog=new StudentLog();
        $studentlog->student()->associate($id);
        $studentlog->save();

    }



}
