<?php

use App\Http\Controllers\site\SiteController;
use App\Http\Controllers\Admin\{SupportController};
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



Route::get('supports/create', [SupportController::class, 'create'])->name('create');
Route::get('supports', [SupportController::class, 'index'])->name('supports');
Route::get('/contato', [SiteController::class, 'contact']);
Route::get('/', function () {
    return view('welcome');
});
