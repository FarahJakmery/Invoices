<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
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

Route::get('/', function () {
    return view('auth.login');
});

//
Route::resource('/invoices', InvoiceController::class);
Route::resource('/sections', SectionController::class);
Route::resource('/products', ProductController::class);
Route::resource('/invoice_details', InvoiceDetailsController::class);
Route::get('/section/{id}', [InvoiceController::class, 'getproducts']);
Route::get('/view_file/{invoice_number}/{file_name}', [InvoiceDetailsController::class, 'open_file'])->name('view_file');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/{page}', [AdminController::class, 'index']);
