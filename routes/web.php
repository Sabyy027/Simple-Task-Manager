
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; 

// Home route
Route::get('/', [TaskController::class, 'index']);

// Task resource routes (CRUD)
Route::resource('tasks', TaskController::class);

