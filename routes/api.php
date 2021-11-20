<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ManagerController;
use App\Http\Controllers\Api\MembershipController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\StatusTaskController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserTypeController;

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

//user crud
Route::get('user-list',[UserController::class,'index']);
Route::post('get-user',[UserController::class,'show']);
Route::post('update-user',[UserController::class,'update']);
Route::post('delete-user',[UserController::class,'destroy']);

Route::post('active-user',[UserController::class,'active']);
Route::post('inActive-user',[UserController::class,'inActive']);

//emplyee crud
Route::get('employee-list',[EmployeeController::class,'index']);
Route::post('get-employee',[EmployeeController::class,'show']);
Route::post('create-employee',[EmployeeController::class,'store']);
Route::post('update-employee',[EmployeeController::class,'update']);
Route::post('delete-employee',[EmployeeController::class,'destroy']);
Route::post('add-employee-Organization',[ManagerController::class,'addEmployeeInOrganization']);
//manager crud
Route::get('manager-list',[ManagerController::class,'index']);
Route::post('get-manager',[ManagerController::class,'show']);
Route::post('create-manager',[ManagerController::class,'store']);
Route::post('update-manager',[ManagerController::class,'update']);
Route::post('delete-manager',[ManagerController::class,'destroy']);
Route::post('subscribe-toMembership',[ManagerController::class,'subscribeToMembership']);

//membership crud
Route::get('membership-list',[MembershipController::class,'index']);
Route::post('get-membership',[MembershipController::class,'show']);
Route::post('create-membership',[MembershipController::class,'store']);
Route::post('update-membership',[MembershipController::class,'update']);
Route::post('delete-membership',[MembershipController::class,'destory']);

//organization fun
Route::get('organization-list',[OrganizationController::class,'index']);
Route::post('get-organization',[OrganizationController::class,'show']);
Route::post('create-organization',[OrganizationController::class,'store']);
Route::post('update-organization',[OrganizationController::class,'update']);
Route::post('delete-organization',[OrganizationController::class,'destroy']);
Route::post('assign-manager-Organization',[ManagerController::class,'assignOrganizationToManager']);

Route::post('active-organization',[OrganizationController::class,'active']);
Route::post('inActive-organization',[OrganizationController::class,'inActive']);