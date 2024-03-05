<?php

use App\Domain\Product\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/listar', [ProductController::class, 'index'])->name('product.list');

Route::post('/cadastrar', [ProductController::class, 'store'])->name('product.create');

Route::put('/atualizar/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/deletar/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
