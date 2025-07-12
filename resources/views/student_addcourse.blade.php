<!DOCTYPE html>
<html>
<head>
    <title>Add Course to Student</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            background-color: #faf3ff;
            width: 80%;
            max-width: 800px;
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
        }

        label {
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }

        select, input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            margin-bottom: 20px;
        }

        input:focus, select:focus {
            border-color: #5c6bc0;
            outline: none;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .form-group label {
            flex: 1;
        }

        .form-group .input-container {
            flex: 1;
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .form-group .input-container input {
            flex: 1;
            margin-right: 20px;
        }

        .form-group .input-container:last-child input {
            margin-right: 0;
        }

        button {
            padding: 10px 20px;
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
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .cancel-button:hover {
            background-color: #e57373;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Course to Student</h1>
        <form action="{{ route('students.addcourse', ['studentID' => $student->studentID]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="courseID">Course:</label>
                <select id="courseID" name="courseID" required>
                    <option value="">Select a Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->courseID }}">{{ $course->courseName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grades">Grades:</label>
                <div class="input-container">
                    <input type="text" id="grades" name="grades" required>
                </div>

                <label for="attendance">Attendance:</label>
                <div class="input-container">
                    <input type="text" id="attendance" name="attendance" required>
                </div>
            </div>

            <button type="submit">Add Course</button>
            <a href="{{ route('students.courses', $student->studentID) }}" class="cancel-button">Cancel</a>
        </form>
    </div>
</body>
</html>
