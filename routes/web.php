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

use App\Http\Controllers\ShippingDocumentController; // Surat Jalan Class
use App\Http\Controllers\TechnicalDocumentController; // Bon teknik Class
use App\Http\Controllers\ComputersController; // Computers Class
use App\Http\Controllers\ProductController;

Route::resource('/barang_masuk/shipping_documents', ShippingDocumentController::class);
Route::resource('/barang_masuk/bon_teknik', TechnicalDocumentController::class);
Route::get('/barang_masuk/bon_teknik/create/{id_surat_jalan}', function() {
    
})->where('id_surat_jalan', '^[0-9]*$')->middleware('cekIdSuratJalan');
Route::resource('/computers', ComputersController::class);

Route::resource('products', ProductController::class);

