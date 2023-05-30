<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    RoleController,
    StaffController,
    StudentController,
    StaffLogController,
    StudentLogController,
    StaffViewLogController,
    StudentViewLogController,
    CategoryController,
    CircularController,
    CircularAttachmentController
};

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

Route::prefix('role')->group(function(){
    Route::post('store', [RoleController::class, 'store']);
    Route::put('{id}/update', [RoleController::class, 'update']);
    Route::get('{id}/show', [RoleController::class, 'show']);
    Route::delete('{id}/destroy', [RoleController::class, 'destroy']);
});

Route::prefix('staff')->group(function(){
    Route::post('store', [StaffController::class, 'store']);
    Route::put('{id}/update', [StaffController::class, 'update']);
    Route::get('{id}/show', [StaffController::class, 'show']);
    Route::delete('{id}/destroy', [StaffController::class, 'destroy']);
});

Route::prefix('student')->group(function(){
    Route::post('store', [StudentController::class, 'store']);
    Route::put('{id}/update', [StudentController::class, 'update']);
    Route::get('{id}/show', [StudentController::class, 'show']);
    Route::delete('{id}/destroy', [StudentController::class, 'destroy']);
});

Route::prefix('stafflog')->group(function(){
    Route::post('store', [StaffLogController::class, 'store']);
    Route::put('{id}/update', [StaffLogController::class, 'update']);
    Route::get('{id}/show', [StaffLogController::class, 'show']);
    Route::delete('{id}/destroy', [StaffLogController::class, 'destroy']);
});

Route::prefix('studentlog')->group(function(){
    Route::post('store', [StudentLogController::class, 'store']);
    Route::put('{id}/update', [StudentLogController::class, 'update']);
    Route::get('{id}/show', [StudentLogController::class, 'show']);
    Route::delete('{id}/destroy', [StudentLogController::class, 'destroy']);
});

Route::prefix('staffviewlog')->group(function(){
    Route::post('store', [StaffViewLogController::class, 'store']);
    Route::put('{id}/update', [StaffViewLogController::class, 'update']);
    Route::get('{id}/show', [StaffViewLogController::class, 'show']);
    Route::delete('{id}/destroy', [StaffViewLogController::class, 'destroy']);
});

Route::prefix('studentviewlog')->group(function(){
    Route::post('store', [StudentViewLogController::class, 'store']);
    Route::put('{id}/update', [StudentViewLogController::class, 'update']);
    Route::get('{id}/show', [StudentViewLogController::class, 'show']);
    Route::delete('{id}/destroy', [StudentViewLogController::class, 'destroy']);
});

Route::prefix('category')->group(function(){
    Route::post('store', [CategoryController::class, 'store']);
    Route::put('{id}/update', [CategoryController::class, 'update']);
    Route::get('{id}/show', [CategoryController::class, 'show']);
    Route::delete('{id}/destroy', [CategoryController::class, 'destroy']);
});

Route::prefix('circular')->group(function(){
    Route::post('store', [CircularController::class, 'store']);
    Route::put('{id}/update', [CircularController::class, 'update']);
    Route::get('{id}/show', [CircularController::class, 'show']);
    Route::delete('{id}/destroy', [CircularController::class, 'destroy']);
});

Route::prefix('circularattachment')->group(function(){
    Route::post('store', [CircularAttachmentController::class, 'store']);
    Route::put('{id}/update', [CircularAttachmentController::class, 'update']);
    Route::get('{id}/show', [CircularAttachmentController::class, 'show']);
    Route::delete('{id}/destroy', [CircularAttachmentController::class, 'destroy']);
});