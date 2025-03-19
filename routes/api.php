<?php

use App\Http\Controllers\Admin\Content\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('content')->group(function () {


    Route::prefix('post')->group(function () {
        Route::post('store',[PostController::class,'store']);
        Route::get('index',[PostController::class,'index']);
        Route::put('{postCategory}',[PostController::class,'update']);
        Route::delete('{postCategory}',[PostController::class,'destroy']);
    });

});
