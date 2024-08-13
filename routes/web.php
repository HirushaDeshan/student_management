<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebPageController::class, 'Home']);
Route::get('/registration', [WebPageController::class, 'Registration']);
Route::get('/loginPage', [WebPageController::class, 'Login']);
Route::get('/maintenance', [WebPageController::class, 'Maintenance']);

Route::post('/login', [UserController::class, 'Login']);
Route::post('/register', [UserController::class, 'Register']);
Route::get('/logout', [UserController::class, 'Logout']);





Route::prefix('student')->group(function () {
    Route::get('/dashboard', [WebPageController::class, 'Dashboard']);

});


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [WebPageController::class, 'AdminDashboard']);

});


Route::post('/addCourse', [AdminController::class, 'AddCourse']);
Route::post('/addLessons', [AdminController::class, 'AddLessons']);
