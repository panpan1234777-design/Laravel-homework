<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

Route::get('/',function(){
    return redirect()->route('login');
});
//static route
Route::get('/students',function(){
    return "Hello,students";
});
//dynamic route
// Route::get('/students/{id}',function($id){
//     return "student ID: ".$id;
// });
//Naming route
// Route::get('/dashboard',function(){
//     return "welcome from Talent professional program";
// })->name('tpp');
// //Redirect route
// Route::get('/talent',function(){
//     return redirect()->route('tpp');
// });
// //Group Route
// Route::prefix('/backend')->group (function(){
//     Route::get('/users',function(){
//         return "This is backend user";
//     });
//     Route::get('/php-talent', function(){
//         return redirect()->route('tpp');
//     });
// });
// Route::prefix('/frontend')->group (function(){
//     Route::get('/users',function(){
//         return "This is frontend users";
//     });
//     Route::get('/laravel',function(){
//         return redirect()->route('tpp');
//     });
// });
// Route::get('/categories',function(){
//     return view('categories.index');

Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/{id}/edit',[UserController::class,'edit'])->name('users.edit');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
Route::post('/users/{id}/update',[UserController::class,'update'])->name('users.update');
Route::post('/users/{id}/delete',[UserController::class,'delete'])->name('users.delete');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

Route::get('/instructors',[InstructorController::class,'index'])->name('instructors.index');
Route::get('/instructors/{id}/edit',[InstructorController::class,'edit'])->name('instructors.edit');
Route::get('/instructors/create',[InstructorController::class,'create'])->name('instructors.create');
Route::post('/instructors/store',[InstructorController::class,'store'])->name('instructors.store');
Route::post('/instructors/{id}/update',[InstructorController::class,'update'])->name('instructors.update');
Route::post('/instructors/{id}/delete',[InstructorController::class,'delete'])->name('instructors.delete');


Route::get('/students',[StudentController::class,'index'])->name('students.index');
Route::get('/students/{id}/edit',[StudentController::class,'edit'])->name('students.edit');
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::post('/students/store',[StudentController::class,'store'])->name('students.store');
Route::post('/students/{id}/update',[StudentController::class,'update'])->name('students.update');
Route::post('/students/{id}/delete',[StudentController::class,'delete'])->name('students.delete');


Route::get('/batches', [BatchController::class, 'index'])->name('batches.index');
Route::get('/batches/{id}/edit',[BatchController::class,'edit'])->name('batches.edit');
Route::post('/batches/{id}/update',[BatchController::class,'update'])->name('batches.update');
Route::get('/batches/create',[BatchController::class,'create'])->name('batches.create');
Route::post('/batches/store',[BatchController::class,'store'])->name('batches.store');
Route::post('/batches/{id}/delete',[BatchController::class,'delete'])->name('batches.delete');

Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/{id}/update',[CategoryController::class,'update'])->name('categories.update');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::post('/categories/{id}/delete',[CategoryController::class,'delete'])->name('categories.delete');

Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/{id}/edit',[PermissionController::class,'edit'])->name('permissions.edit');
Route::post('/permissions/{id}/update',[PermissionController::class,'update'])->name('permissions.update');
Route::get('/permissions/create',[PermissionController::class,'create'])->name('permissions.create');
Route::post('/permissions/store',[PermissionController::class,'store'])->name('permissions.store');
Route::post('/permissions/{id}/delete',[PermissionController::class,'delete'])->name('permissions.delete');

Route::get('/roles', [roleController::class, 'index'])->name('roles.index');
Route::get('/roles/{id}/edit',[roleController::class,'edit'])->name('roles.edit');
Route::post('/roles/{id}/update',[roleController::class,'update'])->name('roles.update');
Route::get('/roles/create',[roleController::class,'create'])->name('roles.create');
Route::post('/roles/store',[roleController::class,'store'])->name('roles.store');
Route::post('/roles/{id}/delete',[roleController::class,'delete'])->name('roles.delete');
});


