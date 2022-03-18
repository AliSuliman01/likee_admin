<?php


namespace App\Domain\Accounts\Actions;


use App\Domain\Accounts\DTO\AccountDTO;
use App\Domain\Accounts\Model\Account;

class AccountStoreAction
{
    public static function execute(
        AccountDTO $accountDTO
    ){

        return Account::create(array_filter($accountDTO->toArray(),function($item){return $item !== null;}));
    }
}
