<?php

namespace App\Observers;

use App\Models\Student;

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
        

        $student->userscreate()->associate(4); 

    }

    public function updating(Student $student) : void {

        
        $student->usersupdate()->associate(4);

    }

    public function deleting(Student $student) : void {
       
        $student->usersdelete()->associate(4);
        $student->save();

    }
}
