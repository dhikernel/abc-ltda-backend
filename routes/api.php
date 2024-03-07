<?php

use App\Domain\Order\Controllers\OrderController;
use App\Domain\Product\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('produtos')->group(function () {

    Route::get('/listar', [ProductController::class, 'index'])->name('product.list');

    Route::post('/cadastrar', [ProductController::class, 'store'])->name('product.create');

    Route::put('/atualizar/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::delete('/deletar/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::prefix('pedidos')->group(function () {

    Route::get('/listar', [OrderController::class, 'index'])->name('order.list');

    Route::post('/cadastrar', [OrderController::class, 'store'])->name('order.create');

    Route::put('/atualizar/{id}', [OrderController::class, 'update'])->name('order.update');

    Route::delete('/deletar/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
});
