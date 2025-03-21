<?php

use App\Http\Controllers\Admin\Content\PostCategoryController;
use App\Http\Controllers\Admin\Content\PostController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('content')->group(function () {

    //postCategory
    Route::prefix('post-category')->group(function () {
      
        Route::post('store',[PostCategoryController::class,'store']);
        Route::get('index',[PostCategoryController::class,'index']);
        Route::get('{postCategory}',[PostCategoryController::class,'show']);
        Route::put('{postCategory}',[PostCategoryController::class,'update']);
        Route::delete('{postCategory}',[PostCategoryController::class,'destroy']);
    });
    //posts
    Route::prefix('post')->group(function () {
      
      Route::post('store',[PostController::class,'store']);
      Route::get('index',[PostController::class,'index']);
      Route::get('{post}',[PostController::class,'show']);
      Route::put('{post}',[PostController::class,'update']);
      Route::delete('{post}',[PostController::class,'destroy']);
      
    });
    
    

});
