<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $studentID = $request->input('password');

        // Check if the student exists with the given email and ID
        $student = Student::where('email', $email)->where('studentID', $studentID)->first();

        if ($student) {
            // Special case for admin login
            if ($email === 'Admin' && $studentID === 'admin') {
                session(['studentID' => $student->studentID]);
                return redirect()->route('admin.homepage');
            } else {
                // Regular student login
                session(['studentID' => $student->studentID]);
                return redirect()->route('student.homepage');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or student ID');
        }
    }
}
