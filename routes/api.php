<?php

use App\Http\Controllers\AccessTokensControllers;
use App\Http\Controllers\ProjectCommentController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TaskCommentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\User_ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//-------------------------testing---------------------//
Route::post('index', [UserController::class,'index']);
Route::post('add', [UserController::class,'add']);
Route::post('create', [UserController::class,'create'])->middleware('EnsurAdmin');
Route::post('auth/access-token', [UserController::class,'login']);
//---------------add project manager--------------//
Route::post('selectManeger', [User_ProjectController::class,'selectManeger']);
//add project
Route::post('createProject', [ProjectsController::class,'create'])->middleware('EnsurAdmin');
// add user to project
Route::post('send', [TaskController::class,'send']);
// add  comment to task
Route::post('addCommentToTask', [TaskCommentController::class,'addComment']);
// add  comment to project
Route::post('addCommentToProject', [ProjectCommentController::class,'addComment']);
// add Task
Route::post('addTask', [TaskController::class,'addTask']);
// Updata a status to Task
Route::post('editTask', [TaskController::class,'editTask']);
Route::get('confirm-subscription/{id}', [TaskController::class,'confirm']);
Route::get('show/Role', [UserController::class,'showRole']);




Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user);
    });
});




