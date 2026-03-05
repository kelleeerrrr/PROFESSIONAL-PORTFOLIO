<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResumeController;

// =================== PUBLIC PAGES =================== //
// Set 'home' as default landing page
Route::get('/', fn() => view('home'))->name('home');

// =================== MAIN PORTFOLIO PAGES =================== //
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/projects', fn() => view('projects'))->name('projects');
Route::get('/skills', fn() => view('skills'))->name('skills');
Route::get('/resume', [ResumeController::class, 'resume'])->name('resume.show');
Route::get('/contact', [AuthController::class, 'contact'])->name('contact.show');
Route::post('/contact', [AuthController::class, 'sendContact'])->name('contact.send');

// =================== OPTIONAL AUTH ROUTES (only if you still want login/edit resume) =================== //
// Show login page
Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes (editing resume)
Route::middleware(['auth'])->group(function () {
    Route::get('/resume/edit/{id}', [ResumeController::class, 'editResume'])->name('resume.edit');
    Route::put('/resume/{id}', [ResumeController::class, 'updateResume'])->name('resume.update');
    Route::post('/resume', [ResumeController::class, 'storeResume'])->name('resume.store');
    Route::delete('/resume/{id}', [ResumeController::class, 'deleteResume'])->name('resume.delete');
    Route::get('/resume/download/{id?}', [ResumeController::class, 'downloadResume'])->name('resume.download');
});