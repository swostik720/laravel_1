<?php

use App\Http\Controllers\homecontroller;
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
});

Route::middleware('auth') -> get('/home', [homecontroller::class,'index']);
Route::get('/login', [homecontroller::class,'login']) -> name('login');
Route::get('/register', [homecontroller::class,'register']);
Route::post('/register', [homecontroller::class,'store']);
Route::post('/login', [homecontroller::class,'verify']);
Route::get('/users', [homecontroller::class,'user']);
Route::get('user/{id}',[homecontroller::class,'edit']);
Route::post('user/{id}',[homecontroller::class,'update']);
Route::get('user/delete/{id}',[homecontroller::class,'delete']);
