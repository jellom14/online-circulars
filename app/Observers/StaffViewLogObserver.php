<?php

namespace App\Observers;

use App\Models\StaffViewLog;

class StaffViewLogObserver
{
    /**
     * Handle the StaffViewLog "created" event.
     */
    public function created(StaffViewLog $staffViewLog): void
    {
        //
    }

    /**
     * Handle the StaffViewLog "updated" event.
     */
    public function updated(StaffViewLog $staffViewLog): void
    {
        //
    }

    /**
     * Handle the StaffViewLog "deleted" event.
     */
    public function deleted(StaffViewLog $staffViewLog): void
    {
        //
    }

    /**
     * Handle the StaffViewLog "restored" event.
     */
    public function restored(StaffViewLog $staffViewLog): void
    {
        //
    }

    /**
     * Handle the StaffViewLog "force deleted" event.
     */
    public function forceDeleted(StaffViewLog $staffViewLog): void
    {
        //
    }

    public function creating(StaffViewLog $staffViewLog) : void {
        

        $staffViewLog->userscreate()->associate(4); 

    }

    public function updating(StaffViewLog $staffViewLog) : void {

        
        $staffViewLog->usersupdate()->associate(4);

    }

    public function deleting(StaffViewLog $staffViewLog) : void {
       
        $staffViewLog->usersdelete()->associate(4);
        $staffViewLog->save();

    }
}
