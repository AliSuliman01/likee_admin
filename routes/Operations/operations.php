    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operations\OperationController;

Route::apiResource('operations',OperationController::class);
