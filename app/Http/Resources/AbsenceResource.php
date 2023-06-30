<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AbsenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return ShortStudentResource
     */
    public function toArray(Request $request): ShortStudentResource
    {
        return new ShortStudentResource($this->student);
    }
}
