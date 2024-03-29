<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('analytics');
Route::get('/clients', [HomeController::class, 'clients'])->name('clients');
Route::get('/mailings', [HomeController::class, 'mailings'])->name('mailings');

Route::prefix('client')->group(function () {
    Route::post('/store', [ClientController::class, 'store']);
});

Route::prefix('mailing')->group(function (){
    Route::post('/add', [MailingController::class, 'store']);
});
