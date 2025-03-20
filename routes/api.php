<?php

use App\Http\Controllers\Admin\Content\PostCategoryController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('content')->group(function () {

    //postCategory
    Route::prefix('post-category')->group(function () {
      
        Route::post('store',[PostCategoryController::class,'store']);
        Route::get('index',[PostCategoryController::class,'index']);
        Route::put('{postCategory}',[PostCategoryController::class,'update']);
        Route::delete('{postCategory}',[PostCategoryController::class,'destroy']);
    });
    //posts
    Route::prefix('post')->group(function () {
      
      Route::post('store',[PostCategoryController::class,'store']);
      Route::get('index',[PostCategoryController::class,'index']);
      Route::put('{post}',[PostCategoryController::class,'update']);
      Route::delete('{post}',[PostCategoryController::class,'destroy']);
      
    });
    
    

});
