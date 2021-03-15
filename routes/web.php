<?php

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

Route::get('/', function () {
    return view('teste');
});


Route::get('/contratos', function () {
    return view('teste',['Banco_Dados'=>'contratos']);
});




Route::get('/equipamentos', function () {
    return view('equipamentos');
});



Route::get('/teste_ajax', [BuscaController::class, 'teste']);

Route::get('/ListaC', [BuscaController::class, 'contratos']);
Route::any('/ListaE', [BuscaController::class, 'equipamentos']);
Route::get('/ListaR', [BuscaController::class, 'regras']);


Route::post('/ajax', [BuscaController::class, 'call']);
Route::put('/edit', [BuscaController::class, 'edit']);

Route::get('/delete', [BuscaController::class, 'delete']);

