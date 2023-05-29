<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CircularController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('create_role');
}); 
*/


Route::get('/', function () {
    return view('create-role');
});

Route::get('create-role', [RoleController::class, 'create']);
Route::post('role-form', [RoleController::class, 'store']);

Route::get('create-staff', [StaffController::class, 'create']);
Route::post('staff-form', [StaffController::class, 'store']);

Route::get('create-student', [StudentController::class, 'create']);
Route::post('student-form', [StudentController::class, 'store']);

Route::get('create-category', [CategoryController::class, 'create']);
Route::post('category-form', [CategoryController::class, 'store']);

Route::get('create-circular', [CircularController::class, 'create']);
Route::post('circular-form', [CircularController::class, 'store']);