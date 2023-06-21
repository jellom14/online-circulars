<?php

namespace App\Observers;

use App\Models\StudentViewLog;

class StudentViewLogObserver
{
    /**
     * Handle the StudentViewLog "created" event.
     */
    public function created(StudentViewLog $studentViewLog): void
    {
        //
    }

    /**
     * Handle the StudentViewLog "updated" event.
     */
    public function updated(StudentViewLog $studentViewLog): void
    {
        //
    }

    /**
     * Handle the StudentViewLog "deleted" event.
     */
    public function deleted(StudentViewLog $studentViewLog): void
    {
        //
    }

    /**
     * Handle the StudentViewLog "restored" event.
     */
    public function restored(StudentViewLog $studentViewLog): void
    {
        //
    }

    /**
     * Handle the StudentViewLog "force deleted" event.
     */
    public function forceDeleted(StudentViewLog $studentViewLog): void
    {
        //
    }

    public function creating(StudentViewLog $studentViewLog) : void {
        

        $studentViewLog->userscreate()->associate(null); 

    }

    public function updating(StudentViewLog $studentViewLog) : void {

        
        $studentViewLog->usersupdate()->associate(null);

    }

    public function deleting(StudentViewLog $studentViewLog) : void {
       
        $studentViewLog->usersdelete()->associate(null);
        $studentViewLog->save();

    }
}
