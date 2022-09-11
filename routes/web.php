<?php

// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return 'Welcome';
});
Route::group(['prefix' => 'solution'], function(){
    Route::get('1', [SolutionController::class, 'solution1']);
    Route::get('2', [SolutionController::class, 'solution2']);
    Route::get('3', [SolutionController::class, 'solution3']);
});