    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accounts\AccountController;

Route::apiResource('accounts',AccountController::class);
