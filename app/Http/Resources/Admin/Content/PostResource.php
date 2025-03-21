<?php

namespace App\Http\Resources\Admin\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
          
          'id' => $this->id,
          'title' => $this->title,
          'body' => $this->body,
          'image' => asset($this->image),
          'status' => $this->status,
          'category' => [
             'name' => $this->category->name,
          ],
          'user' => [
             'name' => $this->user->name,
          ],
       ];
       
    }
}
