<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;


Route::get('/', [CourseController::class, "index"]);

Route::get('/sign_in', [UserController::class, "sign_in"]);
Route::get('/sign_up', [UserController::class, "sign_up"]);
Route::get('/sign_out', [UserController::class, "signout"]);

Route::post('/SignIn_check', [UserController::class, "sign_in_check"]);
Route::post('/SignUp_check', [UserController::class, "sign_up_check"]);

Route::get('/admin_panel', [AdminController::class, 'index']);

Route::get("/application/{id_application}/NotConfirm",[ApplicationController::class, "NotConfirm"]);
Route::get("/application/{id_application}/confirm",[ApplicationController::class, "confirm"]);
Route::get('/application_page', [ApplicationController::class, 'index']);
Route::post('/send-application', [ApplicationController::class, 'chech_appl']);

Route::get('/category/{id}', [CategoryController::class, 'index']);
Route::post("/category/create",[CategoryController::class, "create"]);

Route::post('/course/create', [AdminController::class, 'course_create']);