<?php


namespace App\Domain\Requests\Observer;

use App\Domain\Requests\Model\Request;
use Illuminate\Support\Facades\Auth;


class RequestObserver
{
	  /**
     * Handle the Request "created" event.
     *
     * @param  \App\Domain\Requests\Model\Request  $request
     * @return void
     */
    public function creating(Request $request)
    {
        $request->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Request "updated" event.
     *
     * @param  \App\Domain\Requests\Model\Request  $request
     * @return void
     */
    public function updating(Request $request)
    {
        $request->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Request "deleted" event.
     *
     * @param  \App\Domain\Requests\Model\Request  $request
     * @return void
     */
    public function deleting(Request $request)
    {
        $request->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Request "restored" event.
     *
     * @param  \App\Domain\Requests\Model\Request  $request
     * @return void
     */
    public function restored(Request $request)
    {
        //
    }

    /**
     * Handle the Request "force deleted" event.
     *
     * @param  \App\Domain\Requests\Model\Request  $request
     * @return void
     */
    public function forceDeleted(Request $request)
    {
        //
    }
}
