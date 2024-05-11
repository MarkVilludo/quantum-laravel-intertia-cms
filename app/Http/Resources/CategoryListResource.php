<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "lesson_id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "content" => $this->content,
            "category_id" => $this->category_id,
            "year_id" => $this->year_id,
            "duration" => $this->duration,
            "modules" => $this->whenLoaded('categories', function () {
                return CourseCategoryResource::collection($this->categories);
            })
        ];
    }
}
