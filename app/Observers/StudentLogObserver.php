<?php

namespace App\Observers;

use App\Models\StudentLog;

class StudentLogObserver
{
    /**
     * Handle the StudentLog "created" event.
     */
    public function created(StudentLog $studentLog): void
    {
        //
    }

    /**
     * Handle the StudentLog "updated" event.
     */
    public function updated(StudentLog $studentLog): void
    {
        //
    }

    /**
     * Handle the StudentLog "deleted" event.
     */
    public function deleted(StudentLog $studentLog): void
    {
        //
    }

    /**
     * Handle the StudentLog "restored" event.
     */
    public function restored(StudentLog $studentLog): void
    {
        //
    }

    /**
     * Handle the StudentLog "force deleted" event.
     */
    public function forceDeleted(StudentLog $studentLog): void
    {
        //
    }

    public function creating(StudentLog $studentLog) : void {
        

        $studentLog->userscreate()->associate(4); 

    }

    public function updating(StudentLog $studentLog) : void {

        
        $studentLog->usersupdate()->associate(4);

    }

    public function deleting(StudentLog $studentLog) : void {
       
        $studentLog->usersdelete()->associate(4);
        $studentLog->save();

    }
}
