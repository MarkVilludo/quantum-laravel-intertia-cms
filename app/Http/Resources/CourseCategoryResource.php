<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "module_id" => $this->id,
            "name" => $this->name,
            "course_id" => $this->course_id,
            "description" => $this->description,
            "content" => $this->content?->content,
            "activities" => $this->activities?->activities,
            "step" => $this->step,
        ];
    }
}
