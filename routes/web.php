<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColecoesController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/home', function () {
    return view('admin.dashboard');
});

require __DIR__.'/auth.php';

Route::get('/teste', function () {
    return view('layout.template');
});

Route::get('/ric/login', function () {
    return view('auth.mylogin');
});

Route::get('/ric/user', function () {
    return view('admin.user');
});

Route::get('/user', [UserController::class,'index'])->middleware('auth');
Route::post('/user/registar',[UserController::class,'store'])->middleware('auth');
Route::get('/user/edit/{id}', [UserController::class,'show'])->middleware('auth');
Route::put('/user/bloquear',[UserController::class,'bloquearUser'])->middleware('auth');
//Coleções
Route::get('/colecoes', [ColecoesController::class,'index'])->middleware('auth');
Route::post('/colecoes/registar',[ColecoesController::class,'store'])->middleware('auth');
Route::get('/colecoes/edit/{id}',[ColecoesController::class,'edit'])->middleware('auth');
Route::put('/colecoes/update',[ColecoesController::class,'update'])->middleware('auth');

