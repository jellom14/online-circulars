<?php

namespace App\Observers;

use App\Models\Circular;
use App\Models\CircularAttachment;
use Illuminate\Support\Facades\Storage;

class CircularObserver
{
    /**
     * Handle the Circular "created" event.
     */
    public function created(Circular $circular): void
    {
        //
    }

    /**
     * Handle the Circular "updated" event.
     */
    public function updated(Circular $circular): void
    {
       


}

    /**
     * Handle the Circular "deleted" event.
     */
    public function deleted(Circular $circular): void
    {


    }

    /**
     * Handle the Circular "restored" event.
     */
    public function restored(Circular $circular): void
    {
        //
    }

    /**
     * Handle the Circular "force deleted" event.
     */
    public function forceDeleted(Circular $circular): void
    {
        //
    }

    public function creating(Circular $circular) : void {
        
        $circular->userscreate()->associate(4); 
    }

    public function updating(Circular $circular) : void {

        $circular->usersupdate()->associate(4);

    }


    public function deleting(Circular $circular): void {
        
        $circular->usersdelete()->associate(4);
        $circular->save();

        $circular->circular_attachments->each->delete();
        
    }
    
    

}
