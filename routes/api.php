<?php

use App\Providers\RouteServiceProvider;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
// Route::get('test', 'UserController@index');
// Route::post('store', 'UserController@store');
// Route::post('show/{id}', 'UserController@show');
// Route::post('update/{id}', 'UserController@update');
// Route::post('delete/{id}', 'UserController@destroy');
// Route::post('show_assign', 'AssignController@show');
// Route::post('orwhere', 'AssignController@orWhere');
// Route::post('wheretime', 'AssignController@whereTime');
// Route::post('subquery-test', 'AssignController@subquery_test');
Route::post('employee-create', 'EmployeeController@createEmp');
Route::post('createAssign', 'AssignController@createAssign');
Route::post('activeAssign', 'AssignController@activeAssign');
Route::post('updateProgress', 'AssignController@updateProgress');
Route::post('delete-assigns', 'AssignController@deleteAssignment');
Route::post('delete-emp-ass', 'AssignController@deleteEmployee');
Route::post('search', 'AssignController@search');
