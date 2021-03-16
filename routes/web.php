<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\BuscaController;
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



Route::match(['get', 'post'], '/', [AdmController::class, 'login'])
->name('login');

Route::match(['get', 'post'], '/home', function () {
    return view('/home');
})->name('home');






Route::match(['get', 'post'], '/vendedores', function () {
    return view('/vendedores');
})->name('vendedores');
Route::match(['get', 'post'], '/mercadorias', function () {
    return view('/mercadorias');
})->name('mercadorias');
Route::match(['get', 'post'], '/comissao', function () {
    return view('/comissao');
})->name('comissao');
Route::match(['get', 'post'], '/vendas', function () {
    return view('/vendas');
})->name('vendas');


Route::match(['get', 'post'], '/adm', function () {
    return view('/adm');
})->name('adm');




Route::get('/equipamentos', function () {
    return view('equipamentos');
});



Route::get('/teste_ajax', [BuscaController::class, 'teste']);

Route::get('/Comissao_Grid', [BuscaController::class, 'Comissao_Grid']);
Route::get('/Vendedores_Grid', [BuscaController::class, 'Vendedores_Grid']);
Route::get('/Mercadorias_Grid', [BuscaController::class, 'Mercadorias_Grid']);
Route::get('/Vendas_Grid', [BuscaController::class, 'Vendas_Grid']);


Route::any('/ListaE', [BuscaController::class, 'equipamentos']);
Route::get('/ListaR', [BuscaController::class, 'regras']);


Route::post('/Comissao_insere', [BuscaController::class, 'Comissao_insere']);
Route::put('/Comissao_altera', [BuscaController::class, 'Comissao_altera']);
Route::get('/Comissao_delete', [BuscaController::class, 'Comissao_delete']);


Route::post('/Vendedores_insere', [BuscaController::class, 'Vendedores_insere']);
Route::put('/Vendedores_altera', [BuscaController::class, 'Vendedores_altera']);
Route::get('/Vendedores_delete', [BuscaController::class, 'Vendedores_delete']);


Route::post('/Mercadorias_insere', [BuscaController::class, 'Mercadorias_insere']);
Route::put('/Mercadorias_altera', [BuscaController::class, 'Mercadorias_altera']);
Route::get('/Mercadorias_delete', [BuscaController::class, 'Mercadorias_delete']);

Route::post('/Vendas_insere', [BuscaController::class, 'Vendas_insere']);
Route::put('/Vendas_altera', [BuscaController::class, 'Vendas_altera']);
Route::get('/Vendas_delete', [BuscaController::class, 'Vendas_delete']);


Route::get('/Vendas_Select_Vendedor', [BuscaController::class, 'Vendas_Select_Vendedor']);
Route::get('/Vendas_Select_Mercadoria', [BuscaController::class, 'Vendas_Select_Mercadoria']);

Route::get('/Mercadoria_Select_Comissao', [BuscaController::class, 'Mercadoria_Select_Comissao']);
