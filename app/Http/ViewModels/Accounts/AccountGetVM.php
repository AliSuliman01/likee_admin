<?php


namespace App\Http\ViewModels\Accounts;

use App\Domain\Accounts\Model\Account;
use Illuminate\Contracts\Support\Arrayable;


class AccountGetVM implements Arrayable
{

    private $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function toArray()
    {
        return  $this->account;
    }
}
