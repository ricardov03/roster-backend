<?php

namespace App\Http\Controllers\v1\Users;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use OpenApi\Annotations as OA;

class StudentController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"student"},
     *     path="/api/v1/students",
     *     summary="List all existed Student",
     *     description="List all existed user of type 'Student'.",
     *
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
     *
     *     @OA\RequestBody(
     *
     *         @OA\MediaType(
     *             mediaType="application/json",
     *
     *             @OA\Schema(
     *
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
     *
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function store(UserRequest $student)
    {
        $newStudent = new User($student->validated());
        if ($student?->id) {
            $newStudent->id = $student->id;
        }
        $newStudent->save();

        $newStudent->type()->attach(UserTypes::STUDENT->value);

        return response()->json([
            'status' => 'OK',
        ], 200);
    }

    /**
     * @OA\Get(
     *     tags={"student"},
     *     path="/api/v1/students/{student_id}",
     *     summary="Display details from a student.",
     *     description="Display all details from the given student.",
     *
     *     @OA\Response(
     *         response="200",
     *         description="Get all existing students."
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Student not Found."
     *     )
     * )
     */
    public function show(User $student)
    {
        return new UserResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $updatedStudent, User $student)
    {
        dump($student);
        dd($updatedStudent);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
