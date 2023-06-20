<?php

namespace App\Http\Controllers\Api\v1\Users;

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
     *     tags={"Students"},
     *     path="/api/v1/students",
     *     summary="List all existing Students",
     *     description="List all existing Students.",
     *     operationId="listStudents",
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
     *     tags={"Students"},
     *     path="/api/v1/students",
     *     summary="Add a new Student",
     *     description="Add a new user of type Student.",
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
     *                 example={"id": 432341234, "name": "Marco", "last_name": "Polo", "email": "marco@polo.com"}
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
     *     tags={"Students"},
     *     path="/api/v1/students/{student_id}",
     *     summary="Display a student detais",
     *     description="Display all details from the given student.",
     *     operationId="showStudent",
     *
     *     @OA\Parameter(
     *         description="ID of the Student",
     *         in="path",
     *         name="student_id",
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
     * @OA\Put(
     *     tags={"Students"},
     *     path="/api/v1/students/{student_id}",
     *     summary="Edit an existed Student",
     *     description="Update an Student information.",
     *     operationId="updateStudent",
     *
     *     @OA\Parameter(
     *         description="ID of the Student",
     *         in="path",
     *         name="student_id",
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
     *                 example={"name": "Maria", "last_name": "Vicente", "email": "mvicente@gmail.com"}
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Student not Found."
     *     )
     * )
     */
    public function update(UserRequest $updatedStudent, User $student)
    {
        $student->update($updatedStudent->validated());
        $student->save();

        return response()->json([
            'status' => 'OK',
        ], 200);
    }

    /**
     * @OA\Delete(
     *     tags={"Students"},
     *     path="/api/v1/students/{student_id}",
     *     summary="Delete an existed Student",
     *     description="Delete the given student.",
     *     operationId="deleteStudent",
     *
     *     @OA\Parameter(
     *         description="ID of the Student",
     *         in="path",
     *         name="student_id",
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
     *         description="Get all existing students."
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Not authorized."
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Student not Found."
     *     )
     * )
     */
    public function destroy(User $student)
    {
        // TODO: Implement authentication. if (request()->user()->can('delete', $student)) {}
        $student->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'The Student has been deleted.',
        ], 200);
    }
}
