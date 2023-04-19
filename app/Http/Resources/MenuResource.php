<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'Categories' => CategoryResource::collection($this->whenloaded('Categories')),
            'User' => new UserResource($this->whenloaded('User')),
        ];
    }
}