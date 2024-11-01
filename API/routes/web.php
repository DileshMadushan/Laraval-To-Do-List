<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
Route::get('AddTask', [TaskController::class, 'addtask'])->name('task');
Route::post('AddTask', [TaskController::class, 'savetask'])->name('savetask');
Route::get('tasklist', [TaskController::class, 'tasklist'])->name('tasklist');
Route::get('tasklist/{id}', [TaskController::class, 'deletetask'])->name('deletetask');
require __DIR__.'/auth.php';
