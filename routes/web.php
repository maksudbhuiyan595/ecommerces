<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('backend.master');

});

    Route::get('category-list',[CategoryController::class, 'index'])->name('category.index');
    Route::get('category-create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('category-store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('category-view/{id}',[CategoryController::class, 'view'])->name('category.view');
    Route::get('category-edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category-update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('category-destroy/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('subcategory-list',[SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('subcategory-create',[SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('subcategory-store',[SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('subcategory-view/{id}',[SubcategoryController::class, 'view'])->name('subcategory.view');
    Route::get('subcategory-edit/{id}',[SubcategoryController::class, 'edit'])->name('subcategory.edit');
    // Route::post('category-update/{id}',[CategoryController::class, 'update'])->name('category.update');
    // Route::get('category-destroy/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');



require __DIR__.'/auth.php';
