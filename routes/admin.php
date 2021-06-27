<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('users');

Route::get('courses', [CoursesController::class, 'index'])->name('courses.index');

Route::get('courses/{course}', [CoursesController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/approved', [CoursesController::class, 'approved'])->name('courses.approved');

Route::get('courses/{course}/obsevation', [CoursesController::class, 'observation'])->name('courses.observation');

Route::post('courses/{course}/rejet', [CoursesController::class, 'rejet'])->name('courses.rejet');

Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('levels', LevelController::class)->names('levels');

Route::resource('prices', PriceController::class)->names('prices');