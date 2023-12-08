<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Define your GET routes here
// Example: Route::get('/your-route', 'YourController@yourMethod');

// Define your POST routes here
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
// Example: Route::post('/your-route', 'YourController@yourMethod');

// Define your PUT routes here
// Example: Route::put('/your-route', 'YourController@yourMethod');

// Define your DELETE routes here
// Example: Route::delete('/your-route', 'YourController@yourMethod');
