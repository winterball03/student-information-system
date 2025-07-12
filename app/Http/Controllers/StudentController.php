<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'studentID' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Student::create([
            'studentID' => $validatedData['studentID'],
            'name' => $validatedData['name'],
            'phoneNumber' => $validatedData['phoneNumber'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->only(['name', 'phoneNumber', 'email']));

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function index()
    {
        $students = Student::all();  // Fetch all students

        // Pass only students data to the view
        return view('student', ['students' => $students]);
    }

    public function showStudentCourses($id)
    {
        // Fetch the student and their courses
        $student = Student::with('courses')->findOrFail($id);

        // Pass the student and their courses to the view
        return view('student_courses', ['student' => $student]);
    }

    public function showAddCourseForm($studentID)
    {
        $student = Student::findOrFail($studentID);
        $courses = Course::all();  // Fetch all courses
        return view('student_addcourse', ['student' => $student, 'courses' => $courses]);
    }

    public function addCourse(Request $request, $studentID)
    {
        $request->validate([
            'courseID' => 'required',
            'grades' => 'required',
            'attendance' => 'required',
        ]);

        $student = Student::findOrFail($studentID);
        $student->courses()->attach($request->courseID, [
            'grades' => $request->grades,
            'attendance' => $request->attendance,
        ]);

        return redirect()->route('students.courses', $studentID)->with('success', 'Course added successfully!');
    }


    public function showEditCourseForm($studentID, $courseID)
    {
        $student = Student::findOrFail($studentID);
        $course = $student->courses()->where('student_course.courseID', $courseID)->firstOrFail();

        // Check if there's a success message in the session
        $successMessage = session('success');

        return view('student_updatecourse', compact('student', 'course', 'successMessage'));
    }


    public function updateCourse(Request $request, $studentID, $courseID)
    {
        $request->validate([
            'grades' => 'required|string',
            'attendance' => 'required|string',
        ]);

        $student = Student::findOrFail($studentID);
        $student->courses()->updateExistingPivot($courseID, [
            'grades' => $request->grades,
            'attendance' => $request->attendance,
        ]);

        // Redirect to the student's courses page with a success message
        return redirect()->route('students.courses', $studentID)
                        ->with('success', 'Course updated successfully!');
    }

    public function showDeleteCourse($studentID, $courseID)
    {
        $student = Student::findOrFail($studentID);
        $course = $student->courses()->where('courses.courseID', $courseID)->firstOrFail();

        return view('student_deletecourse', compact('student', 'course'));
    }

    public function removeCourse($studentID, $courseID)
    {
        $student = Student::findOrFail($studentID);
        $student->courses()->detach($courseID);

        return redirect()->route('students.courses', $studentID)->with('success', 'Course removed successfully.');
    }


}
