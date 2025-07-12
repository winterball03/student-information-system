<!DOCTYPE html>
<html>
<head>
    <title>Update Course</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #faf3ff;
            width: 60%;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #5c6bc0;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        label {
            margin: 10px 0 5px;
            color: #555;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #5c6bc0;
            outline: none;
        }

        button {
            padding: 12px 20px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #3f51b5;
        }

        .cancel-button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #e57373;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            text-align: center;
        }

        .cancel-button:hover {
            background-color: #f44336;
        }

        .buttons-container {
            display: flex;
            justify-content: space-between;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            input, select, button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Course for {{ $student->name }}</h1>
        <form action="{{ route('students.updatecourse', [$student->studentID, $course->courseID]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="courseName">Course Name:</label>
            <input type="text" id="courseName" name="courseName" value="{{ $course->courseName }}" required>

            <label for="grades">Grades:</label>
            <input type="text" id="grades" name="grades" value="{{ $course->pivot->grades }}" required>

            <label for="attendance">Attendance:</label>
            <input type="text" id="attendance" name="attendance" value="{{ $course->pivot->attendance }}" required>

            <div class="buttons-container">
                <button type="submit">Update Course</button>
                <a href="{{ route('students.courses', $student->studentID) }}" class="cancel-button">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>
