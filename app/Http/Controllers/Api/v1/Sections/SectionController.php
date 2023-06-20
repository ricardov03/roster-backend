<?php

namespace App\Http\Controllers\Api\v1\Sections;

use App\Http\Controllers\Controller;
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
}
