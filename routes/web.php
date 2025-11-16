<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/register');
});

Route::get('/register', [StudentController::class, 'create'])->name('students.register');
Route::post('/register', [StudentController::class, 'store'])->name('students.store');