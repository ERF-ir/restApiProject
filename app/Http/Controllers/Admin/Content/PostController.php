<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\content\PostCategoryRequesr;
use App\Models\content\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $postCategories = PostCategory::with('parent')->get();
        return response()->json(['data' => $postCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCategoryRequesr $request)
    {
        $input = $request->all();
        PostCategory::create($input);
        return response()->json(['message' => 'data created successfully']);

    }

    public function update(PostCategoryRequesr $request, PostCategory $postCategory)
    {

        $input = $request->all();
        $postCategory->update($input);

        return response()->json(['message' => 'data updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {

        $postCategory->delete();
        return response()->json(['message' => 'data deleted successfully']);

    }
}
