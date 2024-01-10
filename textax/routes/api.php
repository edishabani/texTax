<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ThreadsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/threads', [ThreadsController::class, 'store'])->name('threads.store');
Route::post('/threads/{thread}/upvote', 'App\Http\Controllers\VoteController@upvoteThread');
Route::post('/threads/{thread}/downvote', 'App\Http\Controllers\VoteController@downvoteThread');

Route::post('/comments/{comment}/upvote', 'App\Http\Controllers\VoteController@upvoteComment');
Route::post('/comments/{comment}/downvote', 'App\Http\Controllers\VoteController@downvoteComment');
