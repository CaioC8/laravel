<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/teste", [TesteController::class, "index"]);

Route::get("/teste-data", [TesteController::class, "retornaData"]);
