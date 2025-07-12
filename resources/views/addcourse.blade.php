<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; /* Prevent body from scrolling */
        }
        .container {
            background-color: #faf3ff;
            width: 60%;
            max-width: 800px;
            max-height: 80vh; /* Set a maximum height for the container */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-y: auto; /* Enable vertical scrolling within the container */
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
            margin: 10px 0 5px;
            color: #555;
            font-size: 14px;
        }
        input, select {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d3bdf0;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #bb8fd9;
            outline: none;
        }
        button {
            padding: 12px 20px;
            background-color: #bb8fd9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            display: inline-block;
        }
        button:hover {
            background-color: #a56cc1;
        }
        .cancel-button {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            padding: 12px 20px;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .cancel-button:hover {
            background-color: #e57373;
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
        <h1>Add Course</h1>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <label for="courseID">Course ID:</label>
            <input type="text" id="courseID" name="courseID" required>

            <label for="courseName">Course Name:</label>
            <input type="text" id="courseName" name="courseName" required>

            <label for="courseClassroom">Course Classroom:</label>
            <input type="text" id="courseClassroom" name="courseClassroom" required>

            <label for="courseTime">Course Time:</label>
            <input type="datetime-local" id="courseTime" name="courseTime" required>

            <label for="lecturerID">Lecturer ID:</label>
            <input type="text" id="lecturerID" name="lecturerID" required>

            <label for="lecturerName">Lecturer Name:</label>
            <input type="text" id="lecturerName" name="lecturerName" required>

            <div class="buttons-container">
                <button type="submit">Add Course</button>
                <a href="{{ route('courses.index') }}" class="cancel-button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>

