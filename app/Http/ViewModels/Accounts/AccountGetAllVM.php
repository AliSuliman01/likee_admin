<?php


namespace App\Http\ViewModels\Accounts;

use App\Domain\Accounts\Model\Account;
use Illuminate\Contracts\Support\Arrayable;

class AccountGetAllVM implements Arrayable
{

    public function get_accounts(){
    	return Account::all();
	}
    public function toArray()
    {
        return $this->get_accounts();
    }
}
