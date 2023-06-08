<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColecoesController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TrabalhoController;

/*TrabalhoController:
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
    return view('pagina-inicial.home');
});

Route::get('/pesquisar', function () {
    return view('pagina-inicial.pesquisar');
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
    return view('auth.myLogin');
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
//Categorias
Route::get('/categorias', [CategoriaController::class,'index'])->middleware('auth');

Route::post('/categoria/registar',[CategoriaController::class,'store'])->middleware('auth');
Route::get('/categoria/edit/{id}',[CategoriaController::class,'edit'])->middleware('auth');
Route::put('/categoria/update',[CategoriaController::class,'update'])->middleware('auth');
//
Route::get('/trabalhos', [TrabalhoController::class,'index'])->middleware('auth');
Route::post('/trabalhos/registar',[TrabalhoController::class,'arquivamentoMediado'])->middleware('auth');
Route::get('/trabalho', [TrabalhoController::class,'index'])->middleware('auth');
Route::get('/trabalho/viewdocument/{caminho}', [TrabalhoController::class,'abrirPdf'])->middleware('auth');
Route::get('/trabalho/detalhes/{id}', [TrabalhoController::class,'detalhes'])->middleware('auth');
Route::post('/trabalhos/aprovar', [TrabalhoController::class,'aprovar'])->middleware('auth');
//auto arquivamento
Route::get('/autoarquiamento', [TrabalhoController::class,'autoArquivamento'])->middleware('auth');
Route::post('/autoarquiamento/registar',[TrabalhoController::class,'autoArquivamento_Store'])->middleware('auth');
Route::get('/autoarquiamentos', [TrabalhoController::class,'autoArquivamentos'])->middleware('auth');

//profile
Route::get('/user/profile', [UserController::class,'profile'])->middleware('auth');
