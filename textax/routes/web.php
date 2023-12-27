<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ThreadsController;


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

Route::get('/', function () {
    return view('dashboard');
});

Route::post('/login', 'Auth\LoginController@login');

Route::get('/explore', [App\Http\Controllers\ExploreController::class, 'index'])->name('explore');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/threads/create', [ThreadsController::class, 'create'])->name('threads.create');
    Route::post('/threads', [ThreadsController::class, 'store'])->name('threads.store');
    Route::get('/threads', [ThreadsController::class, 'index'])->name('threads.index');
    Route::get('/threads/{thread}', [ThreadsController::class, 'show'])->name('threads.show');
    Route::get('/threads/edit', [ThreadsController::class, 'show'])->name('threads.edit');
    Route::get('/my-threads', [ThreadsController::class, 'myThreads'])->name('threads.my');

});

require __DIR__.'/auth.php';
