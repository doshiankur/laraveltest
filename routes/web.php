<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserConteroller;

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

Route::view('users','user');
Route::post('userpost', [UserConteroller::class, 'userpost']);
Route::get('userlist',[UserConteroller::class, 'userlist']);
Route::get('deletedata/{id}',[UserConteroller::class, 'deleteUserDetail']);