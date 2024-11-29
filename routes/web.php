<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::resource('/', StudentController::class)
    ->only(['index']);
