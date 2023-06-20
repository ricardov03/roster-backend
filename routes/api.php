<?php

use App\Http\Controllers\Api\v1\Courses\CourseController;
use App\Http\Controllers\Api\v1\Sections\SectionController;
use App\Http\Controllers\api\v1\Users\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::resource('courses', CourseController::class)->only('index', 'show');
    Route::resource('sections', SectionController::class)->only('index');
    Route::resource('students', StudentController::class)->except('create', 'edit');
});
