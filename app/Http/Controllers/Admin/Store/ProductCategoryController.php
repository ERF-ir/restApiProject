<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\ProductCategoryRequest;
use App\Http\Resources\Admin\Store\ProductCategoryResource;
use App\Models\Store\ProductCategory;
use App\Services\ImageService;
use App\Services\ImageTools;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return respons('success',ProductCategoryResource::collection($productCategories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request, ImageTools $imageTools)
    {
        $input = $request->all();
        $path = $imageTools->uploadImage($request->file('image'),'product_categories');
        $input['image'] = $path;
        ProductCategory::create($input);
        return respons('created successfully category');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        return respons('success',new ProductCategoryResource($productCategory));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory, ImageTools $imageTools)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
           
           $imageTools->deleteImage($productCategory->image);
           $path = $imageTools->uploadImage($request->file('image'),'product_categories');
           $input['image'] = $path;
        }
        $productCategory->update($input);
    }

    
    public function destroy(ProductCategory $productCategory, ImageTools $imageTools)
    {
        $productCategory->delete();
        $imageTools->deleteImage($productCategory->image);
        return respons('deleted category successfully',200);
    }
}
