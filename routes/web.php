<?php


use App\Http\Controllers\RoleController;
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

/*
Route::controller(RoleController::class)->group(function () {
Route::get('add-role', [RoleController::class, 'create']);
Route::post('add-role', [RoleController::class, 'store']);
});
*/

Route::get('/', function () {
    return view('create-role');
});
Route::get('create-role', [RoleController::class, 'create']);
Route::post('role-form', [RoleController::class, 'store']);


//Route::get('RoleController', [RoleController::class, 'createrole']);
//Route::get('app/http/controllers/rolecontroller@insert','app/http/controllers/RoleController@createrole');
//Route::post('create','app/http/controllers/RoleController@insert');

//Route::get('createrole', [RoleController::class, 'create']);

//Route::get('createrole','RoleController@create');
//Route::post('create','RoleController@createrole');
