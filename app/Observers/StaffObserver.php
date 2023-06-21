<?php

namespace App\Observers;

use App\Models\StaffLog;
use App\Models\User;

class StaffObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }

    public function creating(User $user) : void {
        
   
        $user->userscreate()->associate(null); 
    }

    public function updating(User $user) : void {

        $user->usersupdate()->associate(null);

    }

    public function deleting(User $user) : void {
       
        $user->usersdelete()->associate(null);
        $user->save();

        $user->circular_attachments->delete();
    }


    // public function retrieved(User $user) : void {

    //     $id = $user->id;
        
    //     //create logs for stafflogs
    //     $stafflog=new StaffLog();
    //     $stafflog->staff()->associate($id);
    //     $stafflog->save();
    // }

}
