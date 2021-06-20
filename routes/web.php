<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('post')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->middleware(['auth'])->name('post.create');
    Route::post('/create', [PostController::class, 'store'])->middleware(['auth'])->name('post.store');
});

Route::get('/dashboard', [PostController::class, 'postsByUser'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
