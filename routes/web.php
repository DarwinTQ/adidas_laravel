<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogisticaController;

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

Route::get('/', [LogisticaController::class, 'dashboard'])->name('dashboard');

Route::prefix('logistica')->group(function () {
    Route::get('/dashboard', [LogisticaController::class, 'dashboard'])->name('logistica.dashboard');
    Route::get('/envios', [LogisticaController::class, 'envios'])->name('logistica.envios');
    Route::get('/pedidos', [LogisticaController::class, 'pedidos'])->name('logistica.pedidos');
    Route::get('/clientes', [LogisticaController::class, 'clientes'])->name('logistica.clientes');
    Route::get('/productos', [LogisticaController::class, 'productos'])->name('logistica.productos');
    Route::get('/repartidores', [LogisticaController::class, 'repartidores'])->name('logistica.repartidores');
    Route::put('/envios/{id}/estado', [LogisticaController::class, 'actualizarEstadoEnvio'])->name('logistica.actualizar-estado');
});
