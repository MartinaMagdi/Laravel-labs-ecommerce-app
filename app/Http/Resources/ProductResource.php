<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "image" => $this->image,
            "description" => $this->description,
            "creator_id" => $this->creator_id,
            "category" => new CategoryResource($this->category),
            "categoryName" => $this->category ? $this->category->name : null
        ];
        // return parent::toArray($request);
    }
}
