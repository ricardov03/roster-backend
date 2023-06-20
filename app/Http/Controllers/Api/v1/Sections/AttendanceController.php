<?php

namespace App\Http\Controllers\Api\v1\Sections;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use App\Models\Section;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Sections"},
     *     path="/api/v1/sections/{section_id}/attendance",
     *     summary="Display all attendances from a section",
     *     description="Display all attendances from the given section.",
     *     operationId="showAttendances",
     *
     *     @OA\Parameter(
     *         description="ID of the Section",
     *         in="path",
     *         name="section_id",
     *         required=true,
     *
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="Get all existing section attendances."
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Attendances not Found."
     *     )
     * )
     */
    public function index(Section $section)
    {
        return AttendanceResource::collection($section->attendances);
    }
}
