<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/skills', function () {
    return view('skills');
});

Route::get("/skills-array", function() {
    return ["laravel", "php", "vue", "javascript"];
});

Route::resource("/projects", ProjectsController::class);
