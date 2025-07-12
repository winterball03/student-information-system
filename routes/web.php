<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;

// Route for the login page
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');

// Route to handle login form submission
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route to show the admin homepage
Route::get('/homepage', [PageController::class, 'homepage'])->name('admin.homepage');

// Route to show the student homepage
Route::get('/student_homepage', [PageController::class, 'studenthomepage'])->name('student.homepage');

// Route to show the student management page
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Route to view courses for a specific student
Route::get('/students/{studentID}/courses', [StudentController::class, 'showStudentCourses'])->name('students.courses');

// Route to show the course management page
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// Route to show the add student page
Route::get('/addstudent', [PageController::class, 'addstudentpage'])->name('students.add');

// Route to show the update student page
Route::get('/updatestudent/{studentID}', [PageController::class, 'updatestudentpage'])->name('students.edit');

// Route to show the delete confirmation page for students
Route::get('/deletestudent/{studentID}', [PageController::class, 'deletestudentpage'])->name('students.delete');

// Route to handle form submission for adding a new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Route to handle form submission for updating a student
Route::put('/students/{studentID}', [StudentController::class, 'update'])->name('students.update');

// Route to handle form submission for deleting a student
Route::delete('/students/{studentID}', [StudentController::class, 'destroy'])->name('students.destroy');

// Route to show the form for creating a new course
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

// Route to store a newly created course
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Route to show the form for editing a course
Route::get('/courses/{courseID}/edit', [CourseController::class, 'edit'])->name('courses.edit');

// Route to update a course
Route::put('/courses/{courseID}', [CourseController::class, 'update'])->name('courses.update');

// Route to show the delete confirmation page for courses
Route::get('/courses/{courseID}/delete', [PageController::class, 'deletecoursepage'])->name('courses.delete');

// Route to delete a course
Route::delete('/courses/{courseID}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Route to show the form for adding a course to a student
Route::get('/student/{studentID}/addcourse', [StudentController::class, 'showAddCourseForm'])->name('students.addcourse');

// Route to store a newly added course for a student
Route::post('/student/{studentID}/addcourse', [StudentController::class, 'addCourse'])->name('students.storecourse');

// Route to show the form for updating a student's course
Route::get('/student/{studentID}/courses/{courseID}/edit', [StudentController::class, 'showEditCourseForm'])->name('students.editcourse');

// Route to update a student's course
Route::put('/student/{studentID}/courses/{courseID}', [StudentController::class, 'updateCourse'])->name('students.updatecourse');

// Route to show the delete course confirmation page
Route::get('/student/{studentID}/courses/{courseID}/delete', [StudentController::class, 'showDeleteCourse'])->name('students.deletecourse');

// Route to remove a student's course
Route::delete('/student/{studentID}/courses/{courseID}', [StudentController::class, 'removeCourse'])->name('students.removecourse');

// Define the route for logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
