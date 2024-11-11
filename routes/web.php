<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard',[StudentController::class,'getStudent'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('student/store',[StudentController::class ,'storeStudent'])->name('students.store');
Route::get('student/edit/{id}',[StudentController::class ,'editStudent'])->name('students.edit');
Route::patch('student/update/{id}',[StudentController::class ,'updateStudent'])->name('students.update');
Route::delete('student/delete/{id}',[StudentController::class ,'deleteStudent'])->name('students.delete');
