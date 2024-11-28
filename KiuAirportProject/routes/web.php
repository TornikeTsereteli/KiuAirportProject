<?php

use App\Http\Controllers\RouteController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;


// routes/api.php

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::post("/test", function (Request $request) {
    return 5;
});




require __DIR__.'/auth.php';
