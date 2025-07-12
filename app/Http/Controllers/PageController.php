<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Course;

class PageController extends Controller
{
    public function loginpage()
    {
        return view('login');
    }

    public function homepage() {
        return view('home');
    }

    public function studenthomepage()
    {
        // Get the student ID from the session
        $studentID = session('studentID');

        // Ensure the student ID exists in the session
        if (!$studentID) {
            return redirect()->route('login.form')->with('error', 'Student not logged in.');
        }

        // Retrieve the student's information along with their courses
        $student = Student::with('courses')->where('studentID', $studentID)->firstOrFail();

        // Pass student data to the view
        return view('student.student_homepage', ['student' => $student]);
    }

    public function studentpage() {
        $students = Student::all();  // Fetch all students
        return view('student', ['students' => $students]);  // Pass data to the view
    }

    public function coursepage() {
        $courses = Course::all(); // Fetch all courses
        return view('course', ['courses' => $courses]); // Pass data to the view
    }

    public function addstudentpage()
    {
        $courses = Course::all(); // Retrieve all courses from the Course model
        return view('addstudent', ['courses' => $courses]); // Pass courses to the view
    }


    public function updatestudentpage($id) {
        $student = Student::find($id);
        return view('updatestudent', compact('student'));
    }

    public function deletestudentpage($id) {
        $student = Student::find($id);
        return view('deletestudent', compact('student'));
    }

    // Course related methods

    public function addcoursepage() {
        return view('addcourse'); // View for adding a course
    }

    public function updatecoursepage($id) {
        $course = Course::find($id);
        return view('updatecourse', compact('course')); // View for updating a course
    }

    public function deletecoursepage($id)
    {
        $course = Course::findOrFail($id);
        return view('deletecourse', compact('course')); // Ensure 'deletecourse' is the correct view name
    }
}

