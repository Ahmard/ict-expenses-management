<?php

use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::prefix('expenses')->group(function () {
    Route::get('/', [ExpensesController::class, 'list']);
    Route::post('/', [ExpensesController::class, 'create']);
});
