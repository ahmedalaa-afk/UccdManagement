<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Course Title' => $this->title,
            'Course Slug' => $this->slug,
            'Course Description' => $this->description,
            'Course Location' => $this->location,
            'Course Status' => $this->status,
            'Start Date' => $this->start_at,
            'End Date' => $this->end_at,
            'Instructor Name' => $this->instructor->name,
            'Instructor Email' => $this->instructor->email,
        ];
    }
}
