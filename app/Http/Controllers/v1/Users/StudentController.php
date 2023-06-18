<?php

namespace App\Http\Controllers\v1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class StudentController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"student"},
     *     path="/api/v1/students",
     *     summary="List all existed Student",
     *     description="List all existed Student Users",
     *     @OA\Response(
     *         response="200",
     *         description="Get all existing students."
     *     )
     * )
     */
    public function index()
    {
        return UserResource::collection(User::typeStudent()->paginate());
    }


    /**
     * @OA\Post(
     *     tags={"student"},
     *     path="/api/v1/students",
     *     summary="Adds a new Student",
     *     description="Adds a new user of type Student",
     *     operationId="addStudent",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="last_name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 example={"id": 432341234, "name": "Marco", "last_name": "Polo", "email": "ricardov@gmail.com"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function store(UserRequest $student)
    {
        $newStudent = new User($student->validated());
        if ($student?->id)
            $newStudent->id = $student->id;
        $newStudent->save();

        return response()->json([
            'status' => 'OK',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
