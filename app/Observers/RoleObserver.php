<?php

namespace App\Observers;

use App\Models\Role;

class RoleObserver
{
    /**
     * Handle the Role "created" event.
     */
    public function created(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "updated" event.
     */
    public function updated(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $role): void
    {
        //
    }

    public function creating(Role $role) : void {
        
        $role->userscreate()->associate(1); 

    }

    public function updating(Role $role) : void {

        
        $role->usersupdate()->associate(1);

    }

    public function deleting(Role $role) : void {
       
        $role->usersdelete()->associate(1);
        $role->save();

    }
}
