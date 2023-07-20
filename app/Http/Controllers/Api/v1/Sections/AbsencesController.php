<?php

namespace App\Http\Controllers\Api\v1\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbsenceRequest;
use App\Models\Attendance;

class AbsencesController extends Controller
{
    /**
     * @OA\Post(
     *     tags={"Absences"},
     *     path="/api/v1/attendances/{attendance_id}/absences",
     *     summary="Add a new Absences to an Attendances List",
     *     description="Add a new Absences to an Attendances List.",
     *     operationId="addAbsence",
     *
     *     @OA\Parameter(
     *         description="ID of the Attendance List",
     *         in="path",
     *         name="attendance_id",
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
     *                     property="roster_id",
     *                     type="integer"
     *                 ),
     *                 example={"roster_id": 24}
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
    public function store(Attendance $attendance, AbsenceRequest $request)
    {
        $absences = collect($request->absences)
            ->filter(fn(bool $value, int $key) => $value === true)
            ->keys()
            ->toArray();
        $attendance->absences()->toggle($absences);

        return response()->json([
            'status' => 'OK',
        ], 200);
    }
}
