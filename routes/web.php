<?php

use App\Http\Controllers\CoiController;
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
use App\Http\Controllers\MailController;
use App\Http\Controllers\TanyaController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\IpManagementController;
use App\Http\Controllers\TestPDFDOM;
use Illuminate\Http\Request;
use App\Http\Controllers\GoodComeController;
use App\Http\Controllers\Laptop\LaptopsController;
use App\Http\Controllers\Laptop\ListLaptopController;
use App\Models\Computer;
use App\Models\ComputerUser;
use Illuminate\Support\Facades\DB;


Route::view('/import/section', 'imports.index_section');
Route::post('/import/import_excel/section', [SectionController::class, 'import_excel'])->name('import_excel_section');


Route::resource('/tanya', TanyaController::class);
Route::resource('/curhat', TanyaController::class);
Route::redirect('/', '/login', 301);








// Route untuk surat
Route::resource('/goods_come/shipping_documents', ShippingDocumentController::class)
    ->middleware(['auth']);
Route::get('/goods_come/shipping_documents/hanging_documents/create', [ShippingDocumentController::class, 'create_hanging_documents'])
    ->middleware('auth')
    ->name('shipping_documents.hanging_documents');
Route::get('/goods_come/shipping_documents/create/{id_technical_document}', [ShippingDocumentController::class, 'create_hanging_document_technical'])
    ->middleware(['auth'])
    ->where('id_technical_document', '^[0-9]*$')
    ->name('shipping_documents.create2');


Route::post('/goods_come/shipping_documents/store2', [ShippingDocumentController::class, 'store2'])
    ->middleware('auth')
    ->name('shipping_documents.store2');

Route::get('/goods_come/shipping_documents/mark/{id}', [ShippingDocumentController::class, 'mark'])
    ->middleware('auth')
    ->name('shipping_documents.mark');
// Route::

// Route untuk bon teknik
Route::resource('/goods_come/technical_documents', TechnicalDocumentController::class)
    ->middleware(['auth']);
Route::get('/goods_come/technical_documents_print', [TechnicalDocumentController::class, 'print'])
    ->middleware(['auth']);
Route::get('/goods_come/technical_documents/hanging_documents/create', [TechnicalDocumentController::class, 'create_hanging_documents'])
    ->middleware('auth')
    ->name('technical_documents.hanging_documents');
Route::get('/goods_come/technical_documents/create/{id_surat_jalan}', [TechnicalDocumentController::class, 'create_hanging_document_shipping'])
    ->middleware('auth')
    ->where('id_surat_jalan', '^[0-9]*$')
    ->name('technical_documents.create2');


// dd($request);
// return view('barang_masuk.bon_teknik.create', ['page_action' => 'Input', 'page_name' => 'Technical Document']);
// Route::post('/goods_come/technical_documents/create', [TechnicalDocumentController::class, 'create'])
//     ->middleware('auth');

// untuk lengkapi surat jalan

Route::post('/goods_come/technical_documents/store2', [TechnicalDocumentController::class, 'store'])
    ->middleware('auth')
    ->name('technical_documents.store');

// unutk input bon teknik
Route::post('/goods_come/technical_documents', [TechnicalDocumentController::class, 'store2'])
    ->middleware('auth')
    ->name('technical_documents.store2');

// Route untuk barang datang
// Route::resource('/incoming_goods', GoodComeController::class);
Route::resource('/goods_come', GoodComeController::class);
// Route::get('/goods_come/{incoming_goods}', [GoodComeController::class, 'show'])
// ->name('goods_come.show');


// Route untuk komputer
Route::resource('/computers', ComputersController::class)
    ->middleware(['auth']);

Route::put('/users/{id}/edit', [ComputersController::class, 'editUser'])
    ->middleware(['auth'])
    ->name('users.editProfile');

Route::put('/computer/{id}/editprogram', [ComputersController::class, 'editProgram'])
    ->middleware(['auth'])
    ->name('computer.editProgram');

Route::post('/test2', [TechnicalDocumentController::class, 'test2'])->name('test2');
Route::view('/test2', 'test2');

// Route::resource('products', ProductController::class);



Route::get('/scan', function () {
    return "safasfasf";
});


// Route untuk send email test
Route::get('/send-email', [MailController::class, 'sendEmail']);


Route::get('/test-pdf', [TestPDFDOM::class, 'test']);

Route::get('/test3', [ComputersController::class, 'getDataComputerIncomplete']);

Route::get('/dashboard', function () {
    return view('dashboard', ['page_action' => 'Input', 'page_name' => 'Technical Document']);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('v1/api/shipping_documents', [ShippingDocumentController::class, 'getData'])
    ->name('api_shipping_documents');

Route::get('v1/api/technical_documents', [TechnicalDocumentController::class, 'getData'])
    ->name('getDataBonTeknikAll');

Route::get('/v1/api/good_come', [GoodComeController::class, 'getData'])
    ->name('ajaxGoodCome');

Route::get('/test', function () {
    dd(
        DB::table('shipping_documents as S')
            ->select('S.no_po', 'T.no_document', 'S.reciver', 'T.user', 'S.item', 'T.departement', 'S.destination', 'FA.status')
            ->join('incoming_goods as IG', 'IG.shipping_document_id', '=', 'S.id')
            ->join('fix_assets as FA', 'FA.id', '=', 'IG.fix_asset_id')
            ->join('technical_documents as T', 'T.shipping_document_id', '=', 'S.id')
            ->get()
    );
});






Route::resource('/laptop', LaptopsController::class);
Route::post('/laptop_action/service', [LaptopsController::class, 'pensiun'])
    ->name('laptop.pensiun.store');
Route::get('/laptop_get_data', [LaptopsController::class, 'index2']);
Route::view('/import_laptop', 'laptop.import_index');
Route::post('/laptop_import', [LaptopsController::class, 'import_excel'])->name('import_excel_section');
// Route::get('/laptop_import_data', [SectionController::class, 'import_excel'])->name('import_excel_section');
Route::resource('/device_laptop', ListLaptopController::class);
Route::get('/v1/api/laptop_device', [LaptopsController::class, 'get_laptop_device'])->name('asf');


Route::resource('/coi', CoiController::class);
Route::post('/coi_action', [CoiController::class, 'update2'])->name('coi_action');
Route::get('/coi_check/{CFINo}/{COFCode}', [CoiController::class, 'coiCheck']);


Route::get('/get_data_cok/{id?}', function ($id = 's') {
    $data = Computer::find($id)->toJSON();
    return $data;
})->name('get_data');
