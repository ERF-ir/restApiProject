<?php

use App\Http\Controllers\Admin\Content\PostCategoryController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Content\MenuController;
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
      Route::patch('{post}/toggle-status',[MenuController::class,'toggle_status']);
      
      
    });
   
   
   //banners
   Route::prefix('banner')->group(function () {
      Route::post('store',[BannerController::class,'store']);
      Route::get('index',[BannerController::class,'index']);
      Route::get('{banner}',[BannerController::class,'show']);
      Route::put('{banner}',[BannerController::class,'update']);
      Route::delete('{banner}',[BannerController::class,'destroy']);
   });
   
   
   //menu
   Route::prefix('menu')->group(function () {
      Route::post('store',[MenuController::class,'store']);
      Route::get('index',[MenuController::class,'index']);
      Route::get('{menu}',[MenuController::class,'show']);
      Route::put('{menu}',[MenuController::class,'update']);
      Route::delete('{menu}',[MenuController::class,'destroy']);
      Route::patch('{menu}/toggle-status',[MenuController::class,'toggle_status']);
      
   });
   
   //comments
   Route::prefix('comment')->group(function () {
      Route::get('index',[MenuController::class,'index']);
      Route::delete('{comment}',[MenuController::class,'destroy']);
      Route::patch('{comment}/toggle-status',[MenuController::class,'toggle_status']);
   });
    
    

});
