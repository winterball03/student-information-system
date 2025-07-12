<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use app\Models\Student;
use Carbon\Carbon;

class CourseController extends Controller
{
    public function create()
    {
        return view('addcourse');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'courseID' => 'required|string|unique:courses',
            'courseName' => 'required|string|max:255',
            'courseClassroom' => 'nullable|string',
            'courseTime' => 'required|date_format:Y-m-d\TH:i', // Expecting format from datetime-local input
            'lecturerID' => 'required|string|max:255',
            'lecturerName' => 'required|string|max:255',
        ]);

        // Convert the courseTime to a Carbon instance
        $courseTime = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['courseTime']);

        // Add converted courseTime to validatedData
        $validatedData['courseTime'] = $courseTime;

        // Create the course
        Course::create($validatedData);

        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('updatecourse', ['course' => $course]);
    }

    public function update(Request $request, $courseID)
    {
        $validatedData = $request->validate([
            'courseName' => 'required|string|max:255',
            'courseClassroom' => 'required|string|max:255',
            'courseTime' => 'required|date_format:Y-m-d\TH:i',
            'lecturerID' => 'required|string|max:255',
            'lecturerName' => 'required|string|max:255',
        ]);

        $course = Course::findOrFail($courseID);
        $course->update($validatedData);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index') // Adjust route if necessary
            ->with('success', 'Course deleted successfully.');
    }


    public function index()
    {
        $courses = Course::all();
        return view('course', ['courses' => $courses]);
    }

    public function studentCourses($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::where('studentID', $id)->get(); // Adjust if your relationship is different

        return view('student_courses', compact('student', 'courses'));
    }

    public function show($studentID, $courseID)
    {
        // Retrieve the student's courses using the studentID and courseID
        $student = Student::find($studentID);
        $course = Course::where('courseID', $courseID)->first();

        // Check if the student and course exist
        if (!$student || !$course) {
            return redirect()->back()->with('error', 'Student or Course not found.');
        }

        // Return the view with the student's course information
        return view('student_courses', compact('student', 'course'));
    }
}
