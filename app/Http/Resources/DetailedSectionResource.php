<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailedSectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $students = $this->students->pluck('student', 'id');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'course' => $this?->course?->name,
            'instructor' => $this?->instructor?->name.' '.$this?->instructor?->last_name,
            'attendance_lists' => $this->attendances->count(),
            'roster_size' => $this->students->count(),
            'roster' => StudentResource::collection($students),
        ];
    }
}
