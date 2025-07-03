<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\ProductRequest;
use App\Http\Resources\Admin\Store\ProductResource;
use App\Models\Store\Product;
use App\Services\ImageService;
use App\Services\ImageTools;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand','category')->get();
        return respons('success',ProductResource::collection($products));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, ImageTools $imageTools)
    {
       $values = $request->all();
       $patch = $imageTools->uploadImage($values['image'],'product');
       $values['image'] = $patch;

       $product = Product::create($values);
       return respons('product created successfully',$product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
       return respons('product show successfully',new ProductResource($product));
    }

    
    public function update(Product $product , ProductRequest $request, ImageTools $imageTools)
    {
       $inputs = $request->all();
       
       
       if ($request->hasFile('image'))
       {
          $imageTools->deleteImage($product->image);
          $path = $imageTools->uploadImage($inputs['image'],'products');
          $inputs['image'] = $path;
       }
       
       $product->update($inputs);
       return respons('product updated successfully',new ProductResource($product));
    
    }

    public function destroy(Product $product)
    {
       $product->delete();
       return respons('product deleted successfully',new ProductResource($product));
    }
    
    public function toggle_status(Product $product)
    {
         $product->status = $product->status == '1' ? '0' : '1';
         $product->save();
         return respons('product change status successfully',new ProductResource($product));
    }
}
