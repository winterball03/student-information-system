<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Homepage</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            width: 90%;
            max-width: 700px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 60px; /* Add space for the footer */
        }
        h1 {
            color: #5c6bc0;
            margin-bottom: 20px;
            text-align: center;
            font-size: 2em;
        }
        .student-info {
            margin-bottom: 20px;
        }
        .student-info label {
            font-weight: bold;
            color: #7e57c2;
        }
        .student-info div {
            margin-bottom: 10px;
            font-size: 1.1em;
        }
        .course-list {
            margin-bottom: 20px;
        }
        .course-list h2 {
            color: #7e57c2;
            margin-bottom: 15px;
        }
        .course-list div {
            margin-bottom: 10px;
            background-color: #e8eaf6;
            padding: 10px;
            border-radius: 8px;
        }
        .logout-btn {
            display: block;
            width: 97%;
            padding: 12px;
            background-color: #f06292;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #c2185b;
        }
        footer {
            background-color: #ffffff;
            width: 100%;
            padding: 10px 0;
            border-top: 1px solid #ddd;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        footer p {
            margin: 0;
            color: #7e57c2;
            font-size: 0.9em;
        }
        footer a {
            color: #5c6bc0;
            text-decoration: none;
            margin: 0 5px;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ $student->name }}</h1>

        <div class="student-info">
            <div><label>ID:</label> {{ $student->studentID }}</div>
            <div><label>Email:</label> {{ $student->email }}</div>
            <div><label>Name:</label> {{ $student->name }}</div>
        </div>

        <div class="course-list">
            <h2>Enrolled Courses:</h2>
            @forelse($student->courses as $course)
                <div>{{ $course->courseName }} (Grades: {{ $course->pivot->grades }}, Attendance: {{ $course->pivot->attendance }})</div>
            @empty
                <div>No courses enrolled</div>
            @endforelse
        </div>

        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>

    <footer>
        <p>© 2024 Student Information System | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a> | <a href="#">Contact Us</a></p>
    </footer>
</body>
</html>
