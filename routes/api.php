<?php

use App\Http\Controllers\Apicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books',[Apicontroller::class,'index']);
Route::post('/books',[Apicontroller::class,'store']);
Route::get('/books/{id}',[Apicontroller::class,'show']);
Route::put('/books/{id}',[Apicontroller::class,'update']);
Route::delete('/books/{id}',[Apicontroller::class,'destroy']);
