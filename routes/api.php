<?php

use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\Content\PostCategoryController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Store\BrandController;
use App\Http\Controllers\Admin\Store\CouponDiscountController;
use App\Http\Controllers\Admin\Store\PublicDiscountController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Store\Brand;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Store\ProductController;
use App\Http\Controllers\Admin\Roles\RolesController;



use App\Http\Controllers\Admin\Store\ProductCategoryController;


#### content section
Route::prefix('content')->group(function () {

    //postCategory_______________________________________________________________________________________
    Route::prefix('post-category')->group(function () {
      
        Route::post('store',[PostCategoryController::class,'store']);
        Route::get('index',[PostCategoryController::class,'index']);
        Route::get('{postCategory}',[PostCategoryController::class,'show']);
        Route::put('{postCategory}',[PostCategoryController::class,'update']);
        Route::delete('{postCategory}',[PostCategoryController::class,'destroy']);
       Route::patch('{postCategory}/toggle-status',[PostCategoryController::class,'toggle_status']);
    });
    
    //posts_______________________________________________________________________________________
    Route::prefix('post')->group(function () {
      
      Route::post('store',[PostController::class,'store']);
      Route::get('index',[PostController::class,'index']);
      Route::get('{post}',[PostController::class,'show']);
      Route::put('{post}',[PostController::class,'update']);
      Route::delete('{post}',[PostController::class,'destroy']);
      Route::patch('{post}/toggle-status',[PostController::class,'toggle_status']);
      
      
    });
   
   
   //banners_______________________________________________________________________________________
   Route::prefix('banner')->group(function () {
      Route::post('store',[BannerController::class,'store']);
      Route::get('index',[BannerController::class,'index']);
      Route::get('{banner}',[BannerController::class,'show']);
      Route::put('{banner}',[BannerController::class,'update']);
      Route::delete('{banner}',[BannerController::class,'destroy']);
   });
   
   
   //menu_______________________________________________________________________________________
   Route::prefix('menu')->group(function () {
      Route::post('store',[MenuController::class,'store']);
      Route::get('index',[MenuController::class,'index']);
      Route::get('{menu}',[MenuController::class,'show']);
      Route::put('{menu}',[MenuController::class,'update']);
      Route::delete('{menu}',[MenuController::class,'destroy']);
      Route::patch('{menu}/toggle-status',[MenuController::class,'toggle_status']);
      
   });
   
   //comments_______________________________________________________________________________________
   Route::prefix('comment')->group(function () {
      Route::get('index',[CommentController::class,'index']);
      Route::delete('{comment}',[CommentController::class,'destroy']);
      Route::patch('{comment}/toggle-status',[CommentController::class,'toggle_status']);
   });
   
});



#### product section
Route::prefix('store')->group(function () {
   
   //postCategory_______________________________________________________________________________________
   Route::prefix('product-category')->group(function () {
      
      Route::post('store',[ProductCategoryController::class,'store']);
      Route::get('index',[ProductCategoryController::class,'index']);
      Route::get('{productCategory}',[ProductCategoryController::class,'show']);
      Route::put('{productCategory}',[ProductCategoryController::class,'update']);
      Route::delete('{productCategory}',[ProductCategoryController::class,'destroy']);
      
   });
   
   
   //brand_______________________________________________________________________________________
   Route::prefix('brand')->group(function () {
      
      Route::post('store',[BrandController::class,'store'])->middleware('auth:sanctum');
      Route::get('index',[BrandController::class,'index']);
      Route::get('{brand}',[BrandController::class,'show']);
      Route::put('{brand}',[BrandController::class,'update']);
      Route::delete('{brand}',[BrandController::class,'destroy']);
      Route::patch('toggle-status/{brand}',[BrandController::class,'toggle_status']);
      
   });
   
   //public-discount_______________________________________________________________________________________
   Route::prefix('public-discount')->group(function () {
      
      Route::post('store',[PublicDiscountController::class,'store']);
      Route::get('index',[PublicDiscountController::class,'index']);
      Route::get('{publicDiscount}',[PublicDiscountController::class,'show']);
      Route::put('{publicDiscount}',[PublicDiscountController::class,'update']);
      Route::delete('{publicDiscount}',[PublicDiscountController::class,'destroy']);
      Route::patch('toggle-status/{publicDiscount}',[PublicDiscountController::class,'toggle_status']);
      
   });
   
   //coupon-discount_______________________________________________________________________________________
   Route::prefix('coupon-discount')->group(function () {
      
      Route::post('store',[CouponDiscountController::class,'store']);
      Route::get('index',[CouponDiscountController::class,'index']);
      Route::get('{couponDiscount}',[CouponDiscountController::class,'show']);
      Route::put('{couponDiscount}',[CouponDiscountController::class,'update']);
      Route::delete('{couponDiscount}',[CouponDiscountController::class,'destroy']);
      Route::patch('toggle-status/{couponDiscount}',[CouponDiscountController::class,'toggle_status']);
      
   });
   Route::prefix('product')->group(function () {
      
      Route::post('store',[ProductController::class,'store']);
      Route::get('index',[ProductController::class,'index']);
      Route::get('{product}',[ProductController::class,'show']);
      Route::put('{product}',[ProductController::class,'update']);
      Route::delete('{product}',[ProductController::class,'destroy']);
      Route::patch('toggle-status/{product}',[ProductController::class,'toggle_status']);
      
   });
   
});





Route::prefix('auth')->group(function () {
   
   Route::post('register',[AuthController::class,'register']);
   Route::post('login',[AuthController::class,'login']);
   Route::get('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
   Route::get('get-me',[AuthController::class,'getMe'])->middleware('auth:sanctum');
   
});

Route::prefix('manage-roles')->group(function () {
   
   Route::get('index',[RolesController::class,'index']);
   Route::post('store',[RolesController::class,'store']);
   Route::get('permissions',[RolesController::class,'permissions']);
   
});








