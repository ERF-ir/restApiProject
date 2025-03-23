<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostRequest;
use App\Http\Resources\Admin\Content\PostResource;
use App\Models\content\Post;
use App\Services\ImageTools;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    public function index()
    {
        $posts = Post::with('category','user')->get();
        return respons('success',PostResource::collection($posts));
    }

    
    public function store(PostRequest $request, ImageTools $imageTools)
    {
       $inputs = $request->all();
       $path = $imageTools->uploadImage($request->file('image'),'posts');
       $inputs['image'] = $path;
       
       Post::create($inputs);
       return respons('created post successfully');
    
    }

   public function show(Post $post)
   {
      return respons('show post successfully',new PostResource($post));
   }
    public function update(PostRequest $request, Post $post, ImageTools $imageTools)
    {
       $inputs = $request->all();
       if ($request->hasFile('image')) {
          $imageTools->deleteImage($post->image);
          $path = $imageTools->uploadImage($request->file('image'),'posts');
          $inputs['image'] = $path;
       }
       $post->update($inputs);
      return respons('updated post successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, ImageTools $imageTools)
    {
       $imageTools->deleteImage($post->image);
       $post->delete();
       return respons('deleted post successfully');
    }
}
