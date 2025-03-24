<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\BrandRequest;
use App\Http\Resources\Admin\Store\BrandResource;
use App\Models\Store\Brand;
use App\Services\ImageService;
use App\Services\ImageTools;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return BrandResource::collection($brands);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request,ImageTools $imageTools)
    {
        $inputs = $request->all();
        $path = $imageTools->uploadImage($request->file('logo'),'brands');
        $inputs['logo'] = $path;
        Brand::create($inputs);
        return respons('created brand successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return respons('success',new BrandResource($brand));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand, ImageTools $imageTools)
    {
        $inputs = $request->all();
        if ($request->hasFile('logo')) {
           $imageTools->deleteImage($brand->logo);
           $path = $imageTools->uploadImage($request->file('logo'),'brands');
           $inputs['logo'] = $path;
        }
        $brand->update($inputs);
        return respons('updated brand successfully');
    }
    
    
    public function destroy(Brand $brand, ImageTools $imageTools)
    {
       $imageTools->deleteImage($brand->logo);
       $brand->delete();
       return respons('deleted brand successfully');
    
    }
   
   public function toggle_status(Brand $brand)
   {
      $brand->status = $brand->status == '0' ? '1' : '0';
      $brand->save();
      return respons('updated status successfully');
   }
   
   
}
