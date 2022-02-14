<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('generate-pdf/{customer}', [App\Http\Controllers\PDFController::class, 'generateCustomerPDF']);

Route::get('importExportView', [App\Http\Controllers\ImportExportController::class, 'importExportView']);
Route::get('export', [App\Http\Controllers\ImportExportController::class, 'export'])->name('export');
Route::post('import', [App\Http\Controllers\ImportExportController::class, 'import'])->name('import');

Route::group(['middleware' => 'verified'], function () {
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});