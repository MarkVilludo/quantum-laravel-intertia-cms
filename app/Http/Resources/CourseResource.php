<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            "title" => $this->title,
            "description" => $this->description,
            "category_id" => $this->category_id,
            "year_id" => $this->year_id,
            "duration" => $this->duration,
            "categories" => CourseCategoryResource::collection($this->categories)
        ];
    }
}
