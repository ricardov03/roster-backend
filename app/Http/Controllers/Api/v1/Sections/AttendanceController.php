<?php

namespace App\Http\Controllers\Api\v1\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use App\Models\Section;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Attendance"},
     *     path="/api/v1/sections/{section_id}/attendances",
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

    /**
     * @OA\Post(
     *     tags={"Attendance"},
     *     path="/api/v1/sections/{section_id}/attendances",
     *     summary="Add a new Attendance List",
     *     description="Add a new Attendance List.",
     *     operationId="addAttendance",
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
     *     @OA\RequestBody(
     *
     *         @OA\MediaType(
     *             mediaType="application/json",
     *
     *             @OA\Schema(
     *
     *                 @OA\Property(
     *                     property="section_id",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="date",
     *                     type="string"
     *                 ),
     *                 example={"date": "2023-06-03"}
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function store(Section $section, AttendanceRequest $attendance)
    {
        $newAttendance = Carbon::create($attendance->date)->toDate();
        $checkIfAttendanceExists = $section->attendances()->whereDate('date', $newAttendance);

        if (!$checkIfAttendanceExists->exists()) {
            $newAttendance = $section->attendances()->save(new Attendance([
                'date' => $newAttendance,
            ]));

        }

        return response()->json([
            'status' => 'OK',
            'attendance' => [
                'last_id' => $newAttendance->getKey()
            ]
        ], 200);
    }
}
