<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use App\Models\Instructor;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
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
Route::get('/dashboard',function(){
    return "welcome from Talent professional program";
})->name('tpp');
//Redirect route
Route::get('/talent',function(){
    return redirect()->route('tpp');
});
//Group Route
Route::prefix('/backend')->group (function(){
    Route::get('/users',function(){
        return "This is backend user";
    });
    Route::get('/php-talent', function(){
        return redirect()->route('tpp');
    });
});
Route::prefix('/frontend')->group (function(){
    Route::get('/users',function(){
        return "This is frontend users";
    });
    Route::get('/laravel',function(){
        return redirect()->route('tpp');
    });
});
// Route::get('/categories',function(){
//     return view('categories.index');
// });
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/{id}/update',[CategoryController::class,'update'])->name('categories.update');

Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::post('/categories/{id}/delete',[CategoryController::class,'delete'])->name('categories.delete');

Route::get('/batches', [BatchController::class, 'index'])->name('batches.index');
Route::get('/batches/{id}/edit',[BatchController::class,'edit'])->name('batches.edit');
Route::post('/batches/{id}/update',[BatchController::class,'update'])->name('batches.update');
Route::get('/batches/create',[BatchController::class,'create'])->name('batches.create');
Route::post('/batches/store',[BatchController::class,'store'])->name('batches.store');
Route::post('/batches/{id}/delete',[BatchController::class,'delete'])->name('batches.delete');

Route::get('/students',[StudentController::class,'index'])->name('students.index');

Route::get('/students/{id}/edit',[StudentController::class,'edit'])->name('students.edit');
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::post('/students/store',[StudentController::class,'store'])->name('students.store');
Route::post('/students/{id}/update',[StudentController::class,'update'])->name('students.update');
Route::post('/students/{id}/delete',[StudentController::class,'delete'])->name('students.delete');

Route::get('/instructors',[InstructorController::class,'index'])->name('instructors.index');
Route::get('/instructors/{id}/edit',[InstructorController::class,'edit'])->name('instructors.edit');
Route::get('/instructors/create',[InstructorController::class,'create'])->name('instructors.create');
Route::post('/instructors/store',[InstructorController::class,'store'])->name('instructors.store');
Route::post('/instructors/{id}/update',[InstructorController::class,'update'])->name('instructors.update');
Route::post('/instructors/{id}/delete',[InstructorController::class,'delete'])->name('instructors.delete');
