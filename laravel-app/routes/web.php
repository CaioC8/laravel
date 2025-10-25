<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/produtos", [ProdutoController::class, "index"])->name("produtos.index");
Route::post("/produtos", [ProdutoController::class, "store"])->name("produtos.store");
Route::delete('/produtos', [ProdutoController::class, 'destroyAll'])->name('produtos.destroyAll');

Route::get("/categorias", [CategoriaController::class, "index"])->name("categorias.index");
Route::post("/categorias", [CategoriaController::class, "store"])->name("categorias.store");
Route::delete('/categorias', [CategoriaController::class, 'destroyAll'])->name('categorias.destroyAll');
