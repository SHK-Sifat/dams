<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\PatientController;


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

Route::get('/', function () {
    return view('welcome');
});

// admin controller start
Route::get('dashboard/', [AdminController::class, 'index']);

Route::get('dashboard/user', [UserController::class, 'index']);
Route::get('dashboard/user/add', [UserController::class, 'add']);
Route::get('dashboard/user/edit/{slug}', [UserController::class, 'edit']);
Route::get('dashboard/user/view/{slug}', [UserController::class, 'view']);
Route::post('dashboard/user/submit', [UserController::class, 'insert']);
Route::post('dashboard/user/update', [UserController::class, 'update']);
Route::get('dashboard/user/softdelete/{id}', [UserController::class, 'softdelete']);
Route::post('dashboard/user/restore', [UserController::class, 'restore']);
Route::post('dashboard/user/delete', [UserController::class, 'delete']);


Route::get('dashboard/department', [DepartmentController::class, 'index']);
Route::get('dashboard/department/add', [DepartmentController::class, 'add']);
Route::get('dashboard/department/edit/{slug}', [DepartmentController::class, 'edit']);
Route::get('dashboard/department/view/{slug}', [DepartmentController::class, 'view']);
Route::post('dashboard/department/submit', [DepartmentController::class, 'insert']);
Route::post('dashboard/department/update', [DepartmentController::class, 'update']);
Route::post('dashboard/department/softdelete', [DepartmentController::class, 'softdelete']);
Route::post('dashboard/department/restore', [DepartmentController::class, 'restore']);
Route::post('dashboard/department/delete', [DepartmentController::class, 'delete']);


Route::get('dashboard/doctor', [DoctorsController::class, 'index']);
Route::get('dashboard/doctor/add', [DoctorsController::class, 'add']);
Route::get('dashboard/doctor/edit/{slug}', [DoctorsController::class, 'edit']);
Route::get('dashboard/doctor/view/{slug}', [DoctorsController::class, 'view']);
Route::post('dashboard/doctor/submit', [DoctorsController::class, 'insert']);
Route::post('dashboard/doctor/update', [DoctorsController::class, 'update']);
Route::post('dashboard/doctor/softdelete', [DoctorsController::class, 'softdelete']);
Route::post('dashboard/doctor/restore', [DoctorsController::class, 'restore']);
Route::post('dashboard/doctor/delete', [DoctorsController::class, 'delete']);

Route::get('dashboard/patient', [PatientController::class, 'index']);
Route::get('dashboard/patient/add', [PatientController::class, 'add']);
Route::get('dashboard/patient/edit/{slug}', [PatientController::class, 'edit']);
Route::get('dashboard/patient/view/{slug}', [PatientController::class, 'view']);
Route::post('dashboard/patient/submit', [PatientController::class, 'insert']);
Route::post('dashboard/patient/update', [PatientController::class, 'update']);
Route::post('dashboard/patient/softdelete', [PatientController::class, 'softdelete']);
Route::post('dashboard/patient/restore', [PatientController::class, 'restore']);
Route::post('dashboard/patient/delete', [PatientController::class, 'delete']);




// admin controller end
require __DIR__.'/auth.php';
