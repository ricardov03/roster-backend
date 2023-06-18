<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *
 *     @OA\Info(
 *         version="1.0.0",
 *         title="Roster Backend",
 *         description="Backend API required to solve the Code Challenge defined by Zipdev + Stanbridge. This documentation includes all the existed methods for the Application.",
 *
 *         @OA\Contact(
 *             email="im@ricardovargas.me"
 *         )
 *     ),
 *
 *     @OA\Server(
 *         description="Roster Backend Server",
 *         url="http://roster-backend.test/api/v1"
 *     )
 * )
 */
class OpenApiSpecs extends Controller
{
}
