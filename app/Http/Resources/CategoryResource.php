<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_leaf' => $this->is_leaf,
            'discount' => $this->discount,
            'Category' => new CategoryResource($this->whenloaded('Category')),
            'Menu' => new MenuResource($this->whenloaded('Menu')),
            'SubCategories' => CategoryResource::collection($this->whenloaded('SubCategories')),
        ];
    }
}