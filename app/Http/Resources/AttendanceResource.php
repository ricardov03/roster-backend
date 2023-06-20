<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'course' => $this->section->course->name,
            'section' => $this->section->name,
            'date' => $this->date,
            'absences_total' => $this->absences->count(),
            'absences' => AbsenceResource::collection($this->absences),
        ];
    }
}
