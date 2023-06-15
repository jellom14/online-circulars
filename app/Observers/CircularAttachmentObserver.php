<?php

namespace App\Observers;

use App\Models\CircularAttachment;

class CircularAttachmentObserver
{
    /**
     * Handle the CircularAttachment "created" event.
     */
    public function created(CircularAttachment $circularAttachment): void
    {
        //
    }

    /**
     * Handle the CircularAttachment "updated" event.
     */
    public function updated(CircularAttachment $circularAttachment): void
    {
        //
    }

    /**
     * Handle the CircularAttachment "deleted" event.
     */
    public function deleted(CircularAttachment $circularAttachment): void
    {
        //
    }

    /**
     * Handle the CircularAttachment "restored" event.
     */
    public function restored(CircularAttachment $circularAttachment): void
    {
        //
    }

    /**
     * Handle the CircularAttachment "force deleted" event.
     */
    public function forceDeleted(CircularAttachment $circularAttachment): void
    {
        //
    }

    public function creating(CircularAttachment $circularattachment) : void {
        
        $circularattachment->circular()->associate($circularattachment->circular_id);
        $circularattachment->userscreate()->associate(4); 

    }

    public function updating(CircularAttachment $circularattachment) : void {
        
        $circularattachment->usersupdate()->associate(4);

    }

    public function deleting(CircularAttachment $circularattachment) : void {
       
        $circularattachment->usersdelete()->associate(4);
        $circularattachment->save();

    }


}
