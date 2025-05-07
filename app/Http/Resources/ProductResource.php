<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'original_price' => $this->original_price,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'images' => $this->images ? json_decode($this->images) : null,
            'is_featured' => $this->is_featured,
            'is_hot' => $this->is_hot,
            'is_on_sale' => $this->is_on_sale,
            'stock' => $this->stock,
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
