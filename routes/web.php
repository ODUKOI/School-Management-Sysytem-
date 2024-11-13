<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Middleware to ensure authentication and session management
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/coming-soon', function () {return view('backend.coming-soon');});

    // Roles routes
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index'); // List all roles
    Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create'); // Show create role form
    Route::post('/roles/store', [RoleController::class, 'store'])->name('role.store'); // Store a new role
    Route::get('/{id}/roles', [RoleController::class, 'show'])->name('role.show'); // Show a single role
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('role.edit'); // Show edit role form
    Route::put('/{id}/roles', [RoleController::class, 'update'])->name('role.update'); // Update a role
    Route::delete('/{id}/roles', [RoleController::class, 'destroy'])->name('role.destroy'); // Delete a role

    // Student routes
    Route::get('/students', [StudentController::class, 'index'])->name('student.index'); // List all students
    Route::get('/students/create', [StudentController::class, 'create'])->name('student.create'); // Show create student form
    Route::post('/students/store', [StudentController::class, 'store'])->name('student.store'); // Store a new student
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('student.show'); // Show a single student
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit'); // Show edit student form
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update'); // Update a student
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy'); // Delete a student


    // Subject routes
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.index'); // List all subjects
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subject.create'); // Show create subject form
    Route::post('/subjects', [SubjectController::class, 'store'])->name('subject.store'); // Store a new subject
    Route::get('/subjects/{id}', [SubjectController::class, 'show'])->name('subject.show'); // Show a single subject
    Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit'); // Show edit subject form
    Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subject.update'); // Update a subject
    Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy'); // Delete a subject

    // Levels
    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
    Route::get('/levels/create', [LevelController::class, 'create'])->name('levels.create');
    Route::post('/levels/store', [LevelController::class, 'store'])->name('levels.store');
    Route::get('levels/{id}/edit', [LevelController::class, 'edit'])->name('levels.edit');
    Route::put('levels/{id}', [LevelController::class, 'update'])->name('levels.update');
    Route::delete('levels/{id}', [LevelController::class, 'destroy'])->name('levels.destroy');

    //teacher
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
    Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teacher.update');

    //enrollment
    Route::get('/enroll/create', [EnrollmentController::class, 'create'])->name('enroll.create');
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/enrollments/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
    Route::post('/enroll', [EnrollmentController::class, 'enroll'])->name('enroll');
    // Route to show enrolled students in a subject
    //Route::get('/subjects/{subjectId}/enrollments', [EnrollmentController::class, 'showSubjectEnrollments'])->name('subjects.enrollments');

});
