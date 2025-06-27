<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequesr;
use App\Http\Resources\Admin\Content\PostCategoryResource;
use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    
    public function index()
    {
        $postCategories = PostCategory::with('parent')->get();
        return respons('success',PostCategoryResource::collection($postCategories));
    }


    public function store(PostCategoryRequesr $request)
    {
        $input = $request->all();
        $postCategory = PostCategory::create($input);
       return respons('دسته بندی مورد نظر با موفقیت ساخته شد',new PostCategoryResource($postCategory));
    }
    
    public function show(PostCategory $postCategory)
    {
       return respons('show post successfully',new PostCategoryResource($postCategory));
    }

    public function update(PostCategoryRequesr $request, PostCategory $postCategory)
    {
            $input = $request->all();
            $postCategory->update($input);
            return respons('ویرایش با موفقیت انجام شد');
    }
   
   public function toggle_status(PostCategory $postCategory)
   {
      $postCategory->status = $postCategory->status == '0' ? '1' : '0';
      $postCategory->save();
      return respons('updated post successfully',new PostCategoryResource($postCategory));
      
    }

    
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return respons('با موفقیت حذف شد');
    }
}
