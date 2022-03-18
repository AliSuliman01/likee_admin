<?php


namespace App\Domain\Accounts\Actions;


use App\Domain\Accounts\DTO\AccountDTO;
use App\Domain\Accounts\Model\Account;

class AccountUpdateAction
{

    public static function execute(
        Account $account,AccountDTO $accountDTO
    ){
        $account->update(array_filter($accountDTO->toArray(),function($item){return $item !== null;}));
        return $account;
    }
}
