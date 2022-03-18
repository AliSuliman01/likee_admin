<?php


namespace App\Domain\Accounts\Actions;


use App\Domain\Accounts\DTO\AccountDTO;
use App\Domain\Accounts\Model\Account;

class AccountDestroyAction
{
    public static function execute(
        Account $account
    ){

        $account->delete();
        return $account;
    }
}
