<?php

namespace App\Http\Controllers\Api\v1\Courses;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use OpenApi\Annotations as OA;

class CourseController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Courses"},
     *     path="/api/v1/courses",
     *     summary="List all existing Courses",
     *     description="List all existing Courses.",
     *     operationId="listCourses",
     *
     *     @OA\Response(
     *         response="200",
     *         description="Get all existing courses."
     *     )
     * )
     */
    public function index()
    {
        return CourseResource::collection(Course::all());
    }

    /**
     * @OA\Get(
     *     tags={"Courses"},
     *     path="/api/v1/courses/{course_id}",
     *     summary="Display a course details",
     *     description="Display all details from the given course.",
     *     operationId="showCourse",
     *
     *     @OA\Parameter(
     *         description="ID of the Course",
     *         in="path",
     *         name="course_id",
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
     *         description="Get all existing courses."
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Course not Found."
     *     )
     * )
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }
}
