<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\SuratJalanController; // Surat Jalan Class
use App\Http\Controllers\BonTeknikController; // Bon teknik Class


Route::resource('/barang_masuk/surat_jalan', SuratJalanController::class);
Route::resource('/barang_masuk/bon_teknik', BonTeknikController::class);


