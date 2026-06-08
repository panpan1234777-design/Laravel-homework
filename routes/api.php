<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BatchController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\InstructorController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::delete('/categories/{id}', [CategoryController::class, 'delete']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);

Route::get('/permissions',[PermissionController::class,'index']);
Route::post('/permissions',[PermissionController::class, 'store']);
Route::get('/permissions/{id}',[PermissionController::class,'show']);
Route::delete('/permissions/{id}',[PermissionController::class,'delete']);
Route::put('/permissions/{id}',[PermissionController::class, 'update']);

Route::get('/roles',[RoleController::class,'index']);
Route::get('/roles/{id}',[RoleController::class,'show']);
Route::delete('/roles/{id}',[RoleController::class,'delete']);
Route::post('/roles',[RoleController::class,'store']);
Route::put('/roles/{id}',[RoleController::class,'update']);

Route::get('/roles',[RoleController::class,'index']);
Route::get('/roles/{id}',[RoleController::class,'show']);
Route::delete('/roles/{id}',[RoleController::class,'delete']);
Route::post('/roles',[RoleController::class,'store']);
Route::put('/roles/{id}',[RoleController::class,'update']);

Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::delete('/users/{id}',[UserController::class,'delete']);
Route::post('/users',[UserController::class,'store']);
Route::put('/users/{id}',[UserController::class,'update']);

Route::get('/batches',[BatchController::class,'index']);
Route::get('/batches/{id}',[BatchController::class,'show']);
Route::delete('/batches/{id}',[BatchController::class,'delete']);
Route::post('/batches',[BatchController::class,'store']);
Route::put('/batches/{id}',[BatchController::class,'update']);

Route::get('/instructors',[InstructorController::class,'index']);
Route::get('/instructors/{id}',[InstructorController::class,'show']);
Route::delete('/instructors/{id}',[InstructorController::class,'delete']);
Route::post('/instructors',[InstructorController::class,'store']);
Route::put('/instructors/{id}',[InstructorController::class,'update']);

Route::get('/students',[StudentController::class,'index']);
Route::get('/students/{id}',[StudentController::class,'show']);
Route::delete('/students/{id}',[StudentController::class,'delete']);
Route::post('/students',[StudentController::class,'store']);
Route::put('/students/{id}',[StudentController::class,'update']);



