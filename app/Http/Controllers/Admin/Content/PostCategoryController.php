<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\content\PostCategoryRequesr;
use App\Http\Resources\Admin\Content\PostCategoryResource;
use App\Models\content\PostCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $postCategories = PostCategory::with('parent')->get();
        return respons('لیست دسته بندی پست ها',PostCategoryResource::collection($postCategories));
    }


    public function store(PostCategoryRequesr $request)
    {
        $input = $request->all();
        PostCategory::create($input);
       return respons('دسته بندی مورد نظر با موفقیت ساخته شد');
    }

    public function update(PostCategoryRequesr $request, PostCategory $postCategory)
    {
            $input = $request->all();
            $postCategory->updatdssse($input);
            return respons('ویرایش با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return respons('با موفقیت حذف شد');
    }
}
