<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/initialise', [AdminController::class, 'initialise'])->name('initalise');

Route::prefix('post')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->middleware(['auth'])->name('post.create');
    Route::post('/create', [PostController::class, 'store'])->middleware(['auth'])->name('post.store');
    Route::get('/index', [PostController::class, 'index'])->middleware(['auth'])->name('post.index');

});

Route::get('/dashboard', [PostController::class, 'postsByUser'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
