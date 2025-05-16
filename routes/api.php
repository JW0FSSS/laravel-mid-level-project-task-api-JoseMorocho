<?php

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/projects',[ProyectoController::class,'index']);
Route::get('/projects/{id}',[ProyectoController::class,'getDetails']);
Route::post('/projects',[ProyectoController::class,'store']);
Route::put('/projects/{id}',[ProyectoController::class,'edit']);
Route::delete('/projects/{id}',[ProyectoController::class,'destroy']);


Route::get('/tasks',[TareaController::class,'index']);
Route::get('/tasks/{id}',[TareaController::class,'getDetails']);
Route::post('/tasks',[TareaController::class,'store']);
Route::put('/tasks/{id}',[TareaController::class,'edit']);
Route::delete('/tasks/{id}',[TareaController::class,'destroy']);
