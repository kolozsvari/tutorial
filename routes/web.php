<?php

use App\Http\Controllers\TeszController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teszt', [TeszController::class, 'teszt']);
Route::get('/names', [TeszController::class, 'names']);
Route::get('/names/create/{family}/{name}', [TeszController::class, 'namesCreate']);
Route::get('/families/create/{name}', [TeszController::class, 'familyCreate']);
Route::post('/names/delete', [TeszController::class, 'deleteName']);