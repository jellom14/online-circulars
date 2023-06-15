<?php

namespace App\Observers;

use App\Models\StaffLog;

class StaffLogObserver
{
    /**
     * Handle the StaffLog "created" event.
     */
    public function created(StaffLog $staffLog): void
    {
        //
    }

    /**
     * Handle the StaffLog "updated" event.
     */
    public function updated(StaffLog $staffLog): void
    {
        //
    }

    /**
     * Handle the StaffLog "deleted" event.
     */
    public function deleted(StaffLog $staffLog): void
    {
        //
    }

    /**
     * Handle the StaffLog "restored" event.
     */
    public function restored(StaffLog $staffLog): void
    {
        //
    }

    /**
     * Handle the StaffLog "force deleted" event.
     */
    public function forceDeleted(StaffLog $staffLog): void
    {
        //
    }

    public function creating(StaffLog $staffLog) : void {
        

        $staffLog->userscreate()->associate(4); 

    }

    public function updating(StaffLog $staffLog) : void {

        
        $staffLog->usersupdate()->associate(4);

    }

    public function deleting(StaffLog $staffLog) : void {
       
        $staffLog->usersdelete()->associate(4);
        $staffLog->save();

    }
}
