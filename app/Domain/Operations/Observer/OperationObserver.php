<?php


namespace App\Domain\Operations\Observer;

use App\Domain\Operations\Model\Operation;
use Illuminate\Support\Facades\Auth;


class OperationObserver
{
	  /**
     * Handle the Operation "created" event.
     *
     * @param  \App\Domain\Operations\Model\Operation  $operation
     * @return void
     */
    public function creating(Operation $operation)
    {
        $operation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Operation "updated" event.
     *
     * @param  \App\Domain\Operations\Model\Operation  $operation
     * @return void
     */
    public function updating(Operation $operation)
    {
        $operation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Operation "deleted" event.
     *
     * @param  \App\Domain\Operations\Model\Operation  $operation
     * @return void
     */
    public function deleting(Operation $operation)
    {
        $operation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Operation "restored" event.
     *
     * @param  \App\Domain\Operations\Model\Operation  $operation
     * @return void
     */
    public function restored(Operation $operation)
    {
        //
    }

    /**
     * Handle the Operation "force deleted" event.
     *
     * @param  \App\Domain\Operations\Model\Operation  $operation
     * @return void
     */
    public function forceDeleted(Operation $operation)
    {
        //
    }
}
