<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserProfileController;

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
    // Display the user profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Handle the form submission from the profile edit page
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/threads', [ThreadsController::class, 'store'])->name('threads.store');
    Route::get('/threads', [ThreadsController::class, 'index'])->name('threads.index');
    Route::delete('/threads/{thread}', [ThreadsController::class, 'destroy'])->name('threads.destroy');

    Route::get('/threads/create', [ThreadsController::class, 'create'])->name('threads.create');
    Route::get('/threads/{thread}', [ThreadsController::class, 'show'])->name('threads.show');
    Route::get('/threads/{thread}/edit', [ThreadsController::class, 'edit'])->name('threads.edit');

    Route::patch('/threads/{thread}', [ThreadsController::class, 'update'])->name('threads.update');
    Route::put('/threads/{thread}', [ThreadsController::class, 'update'])->name('threads.update');

    Route::get('/my-threads', [ThreadsController::class, 'myThreads'])->name('threads.my');

    Route::get('/comments', 'App\Http\Controllers\Auth\CommentsController@index');
    Route::post('/threads/{thread}/comments', 'App\Http\Controllers\Auth\CommentsController@store')->name('comments.store');

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});

require __DIR__.'/auth.php';
