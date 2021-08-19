<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputersController; // Computers Class
use App\Http\Controllers\ShippingDocumentController; // Surat Jalan Class
use App\Http\Controllers\GoodComeController;
use App\Http\Controllers\Laptop\LaptopsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/api/computers', [ComputersController::class, 'getData'])
    ->name('ajaxComputer');
Route::get('/v1/api/computers_incomplete', [ComputersController::class, 'getDataComputerIncomplete'])
    ->name('ajaxComputerIncomplete');


Route::get('/v1/api/good_come', [GoodComeController::class, 'getData'])
    ->name('ajaxGetRoute ');
