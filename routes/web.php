<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index']);

Route::get('/create', [TodoController::class, 'create']);

Route::post('/store-data', [TodoController::class, 'store']);

Route::get('/edit/{id}', [TodoController::class, 'edit']);

Route::post('/update/{todo}', [TodoController::class, 'update']);

Route::get('/delete/{todo}', [TodoController::class, 'delete']);

Route::get('/details/{todo}', [TodoController::class, 'details']);
