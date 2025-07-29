<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResourse extends JsonResource
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
             'name' => $this->name,
             'image' => asset($this->image),
             'email' => $this->email,
             'created_at' => explode(' ',Carbon::parse($this->created_at)->timezone('Asia/Tehran')->toDateTimeString())[0],
             
             'roles' => $this->getRoleNamesAttribute(),
          ];
       
    }
}
