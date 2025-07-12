<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout(); // Logout the user
        return redirect('/'); // Redirect to the login page
    }
}
