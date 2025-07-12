<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
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

        .actions .view-courses {
            background-color: #2196F3;
        }

        .actions button:hover {
            opacity: 0.9;
        }

        .add-student, .back-button {
            padding: 10px 20px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .add-student:hover, .back-button:hover {
            background-color: #3f51b5;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            width: 80%;
            text-align: center;
            color: white;
            font-size: 16px;
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

    <h1>Student List</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            @foreach ($students as $student)
            <tr>
                <td>{{ $student->studentID }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->phoneNumber }}</td>
                <td>{{ $student->email }}</td>
                <td class="actions">
                    <a href="{{ route('students.edit', $student->studentID) }}">
                        <button type="button" class="update">Update</button>
                    </a>
                    <a href="{{ route('students.delete', $student->studentID) }}">
                        <button type="button" class="delete">Delete</button>
                    </a>
                    <a href="{{ route('students.courses', $student->studentID) }}">
                        <button type="button" class="view-courses">View Courses</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div>
        <button class="back-button" onclick="navigateToPage('homepage')">Back to Home</button>
        <button class="add-student" onclick="navigateToPage('addstudent')">Add Student</button>
    </div>

    <script>
        function navigateToPage(page, studentID = '') {
            window.location.href = page + (studentID ? '?id=' + studentID : '');
        }
    </script>
</body>
</html>
