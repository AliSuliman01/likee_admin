    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Requests\RequestController;

Route::apiResource('requests',RequestController::class);
