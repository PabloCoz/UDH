<?php

use App\Http\Controllers\Teacher\CoursesController;
use App\Http\Livewire\Teacher\CoursesCurriculum;
use App\Http\Livewire\Teacher\CoursesStudents;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'teacher/courses');

Route::resource('courses', CoursesController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar Cursos')->name('courses.curriculum');

Route::get('courses/{course}/goals', [CoursesController::class, 'goals'])->name('courses.goals');

Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Actualizar Cursos')->name('courses.students');

Route::post('courses/{course}/status', [CoursesController::class, 'status'])->name('courses.status');

Route::get('courses/{course}/observation', [CoursesController::class, 'observation'])->name('courses.observation');