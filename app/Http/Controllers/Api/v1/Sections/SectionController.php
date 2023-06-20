<?php

namespace App\Http\Controllers\Api\v1\Sections;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailedSectionResource;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class SectionController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Sections"},
     *     path="/api/v1/sections",
     *     summary="List all existing Sections",
     *     description="List all existing Sections.",
     *     operationId="listSections",
     *
     *     @OA\Response(
     *         response="200",
     *         description="Get all existing sections."
     *     )
     * )
     */
    public function index()
    {
        return SectionResource::collection(Section::all());
    }

    /**
     * @OA\Get(
     *     tags={"Sections"},
     *     path="/api/v1/sections/{section_id}",
     *     summary="Display a section detais",
     *     description="Display all details from the given section.",
     *     operationId="showSection",
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
    public function show(Section $section)
    {
        ray()->showQueries();
        return new DetailedSectionResource($section);
    }
}
