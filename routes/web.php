<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('welcome');
});

// Route::view('/', 'pages.home')->name('home');
// Route::view('/projects', 'pages.projects')->name('projects');
// Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/home', [HomeController::class, 'index_home'])->name('home');
Route::get('/projects', [ProjectsController::class, 'index_projects'])->name('projects');
Route::get('/contact', [ContactController::class, 'index_contact'])->name('contact');

Route::get('/theme/toggle', function () {
    $theme = session('theme', 'light');
    session(['theme' => $theme === 'light' ? 'dark' : 'light']);
    return back();
})->name('theme.toggle');