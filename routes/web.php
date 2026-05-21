<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BatchController;

Route::get('/',function(){
    return view('welcome');
});
//static route
Route::get('/students',function(){
    return "Hello,students";
});
//dynamic route
Route::get('/students/{id}',function($id){
    return "student ID: ".$id;
});
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
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/batches', [BatchController::class, 'index'])->name('batches.index');
Route::get('/batches/{id}/edit',[BatchController::class,'edit'])->name('batches.edit');
Route::get('/batches/create',[BatchController::class,'create'])->name('batches.create');
Route::post('/batches/store',[BatchController::class,'store'])->name('batches.store');

