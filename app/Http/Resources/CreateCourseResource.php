<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Course Title' => $request->title,
            'Course Image' => $this->image,
            'Course Slug' => $this->slug,
            'Course Description' => $request->description,
            'Course Location' => $request->location,
            'Course Status' => $request->status,
            'Start Date' => $request->start_at,
            'End Date' => $request->end_at,
            'Instructor Name' => $this->instructor->name,
            'Instructor Email' => $this->instructor->email,
        ];
    }
}
