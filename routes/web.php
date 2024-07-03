<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RecipeController::class, 'index'])->name('home');
Route::get('/recipe/{id}', [RecipeController::class, 'show']);

Route::get('/api/recipe/{id}', [RecipeController::class, 'apiRecipe']);
Route::get('/api/recipes/{page}', [RecipeController::class, 'apiRecipes']);
Route::get('/api/category/{id}/{page}', [RecipeController::class, 'apiCategory']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
