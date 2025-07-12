<!DOCTYPE html>
<html>
<head>
    <title>Student Courses</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            color: #5c6bc0;
            margin-bottom: 20px;
        }

        .table-container {
            width: 80%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #7e57c2;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #e8eaf6;
        }

        .actions button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin: 2px;
            color: white;
        }

        .actions .update {
            background-color: #ffc107;
        }

        .actions .delete {
            background-color: #f44336;
        }

        .actions button:hover {
            opacity: 0.9;
        }

        .navigation-buttons {
            margin-top: 20px;
        }

        .navigation-buttons a, .navigation-buttons button {
            padding: 10px 20px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .navigation-buttons a:hover, .navigation-buttons button:hover {
            background-color: #3f51b5;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            width: 80%;
            text-align: center;
            font-size: 16px;
            color: white;
        }

        .success {
            background-color: #4caf50;
        }

        .error {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    
    @if(session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    <h1>Student: {{ $student->name }}</h1>

    <div class="table-container">
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Grades</th>
                <th>Attendance</th>
                <th>Actions</th>
            </tr>

            @foreach ($student->courses as $course)
            <tr>
                <td>{{ $course->courseID }}</td>
                <td>{{ $course->courseName }}</td>
                <td>{{ $course->pivot->grades }}</td>
                <td>{{ $course->pivot->attendance }}</td>
                <td class="actions">
                    <a href="{{ route('students.editcourse', [$student->studentID, $course->courseID]) }}">
                        <button type="button" class="update">Update</button>
                    </a>
                    <a href="{{ route('students.deletecourse', [$student->studentID, $course->courseID]) }}">
                        <button type="button" class="delete">Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="navigation-buttons">
        <button class="back-button" onclick="navigateToPage('{{ route('students.index') }}')">Back to Student List</button>
        <button class="add-course" onclick="navigateToPage('{{ route('students.addcourse', ['studentID' => $student->studentID]) }}')">Add Course</button>
    </div>

    <script>
        function navigateToPage(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
