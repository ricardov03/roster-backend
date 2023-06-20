<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Courses",
 *     description="All operations related to the Courses."
 * ),
 * @OA\Tag(
 *     name="Sections",
 *     description="All operations related to the Sections."
 * ),
 * @OA\Tag(
 *     name="Attendance",
 *     description="All operations related to the Attendances."
 * ),
 * @OA\Tag(
 *     name="Absences",
 *     description="All operations related to the Absences."
 * ),
 * @OA\Tag(
 *     name="Students",
 *     description="All operations related to the Students."
 * )
 */
class OpenApiTags extends Controller
{
}
