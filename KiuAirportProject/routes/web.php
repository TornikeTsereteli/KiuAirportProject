<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/get-routes',[RouteController::class,'getRoutes']);
Route::post('/add-route',[RouteController::class,'addRoute']);
Route::post('/addnumber',[RouteController::class,'addNumber']);


require __DIR__.'/auth.php';
