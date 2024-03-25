<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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

// トップ画面
Route::get('/', function () {
    return view('welcome');
});

// ダッシュボード
Route::get('/dashboard',[MainController::class, 'publicGet'])
->middleware(['auth', 'verified'])->name('dashboard');

// ユーザー限定ページ
Route::get('/userOnly',[MainController::class, 'privateGet'])
->middleware(['auth', 'verified'])->name('privateGet');
Route::post('/userOnly',[MainController::class, 'privateGetPost'])
->middleware(['auth', 'verified'])->name('privateGetPost');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
