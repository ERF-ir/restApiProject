<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\BannerRequest;
use App\Http\Resources\Admin\Content\BannertResource;
use App\Models\content\Banner;
use App\Services\ImageTools;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return respons('success',BannertResource::collection($banners));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request, ImageTools $imageTools)
    {
        $input = $request->all();
        $path = $imageTools->uploadImage($request->file('image'),'banners');
        $input['image'] = $path;
        Banner::create($input);
        
        return respons('successful create banner',$input);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
       
       return respons('success',new BannertResource($banner));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner, ImageTools $imageTools)
    {
        $input = $request->all();
        if ($request->file('image')) {
           $imageTools->deleteImage($banner->image);
           $path = $imageTools->uploadImage($request->file('image'),'banners');
           $input['image'] = $path;
        }
        $banner->update($input);
        return respons('successful update banner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
       $banner->delete();
       return respons('successful delete banner');
    }
}
