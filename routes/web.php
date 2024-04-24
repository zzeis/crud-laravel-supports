<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\site\SiteController;
use App\Http\Controllers\Admin\{ReplySupportController, SupportController};
use App\Http\Controllers\ProfileController;
use App\Models\Support;
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

Route::get('/test', function () {
    dd(array_column(SupportStatus::cases(), 'name'));
});




Route::get('/contato', [SiteController::class, 'contact']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/supports/{id}/replies', [ReplySupportController::class, 'store'])->name('replies.store');
    Route::delete('/supports/{id}/replies/{reply}', [ReplySupportController::class, 'destroy'])->name('replies.destroy');
    Route::get('/supports/{id}/replies', [ReplySupportController::class, 'index'])->name('replies.index');



    //Routes supports 
    Route::delete('supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
    Route::put('supports/{id}', [SupportController::class, 'update'])->name('supports.update');
    Route::get('supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
    Route::get('supports/create', [SupportController::class, 'create'])->name('supports.create');
    Route::get('supports/{id}', [SupportController::class, 'show'])->name('supports.show');
    Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
    Route::get('supports', [SupportController::class, 'index'])->name('supports.index');
});

require __DIR__ . '/auth.php';
