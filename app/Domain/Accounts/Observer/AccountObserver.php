<?php


namespace App\Domain\Accounts\Observer;

use App\Domain\Accounts\Model\Account;
use Illuminate\Support\Facades\Auth;


class AccountObserver
{
	  /**
     * Handle the Account "created" event.
     *
     * @param  \App\Domain\Accounts\Model\Account  $account
     * @return void
     */
    public function creating(Account $account)
    {
        $account->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Account "updated" event.
     *
     * @param  \App\Domain\Accounts\Model\Account  $account
     * @return void
     */
    public function updating(Account $account)
    {
        $account->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Account "deleted" event.
     *
     * @param  \App\Domain\Accounts\Model\Account  $account
     * @return void
     */
    public function deleting(Account $account)
    {
        $account->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Account "restored" event.
     *
     * @param  \App\Domain\Accounts\Model\Account  $account
     * @return void
     */
    public function restored(Account $account)
    {
        //
    }

    /**
     * Handle the Account "force deleted" event.
     *
     * @param  \App\Domain\Accounts\Model\Account  $account
     * @return void
     */
    public function forceDeleted(Account $account)
    {
        //
    }
}
