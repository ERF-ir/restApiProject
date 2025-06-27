<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\ProductRequest;
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
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
