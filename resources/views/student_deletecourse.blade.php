<!DOCTYPE html>
<html>
<head>
    <title>Remove Course</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: white;
            width: 60%;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #5c6bc0;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .actions button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            color: white;
        }

        .actions .delete {
            background-color: #f44336;
        }

        .actions .cancel {
            background-color: #5c6bc0;
        }

        .actions .delete:hover {
            background-color: #e57373;
        }

        .actions .cancel:hover {
            background-color: #3f51b5;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            .actions button {
                font-size: 14px;
                padding: 10px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Remove Course</h1>
        <p>Are you sure you want to remove the course <strong>{{ $course->courseName }}</strong> from the student <strong>{{ $student->name }}</strong>?</p>
        <div class="actions">
            <form method="POST" action="{{ route('students.removecourse', ['studentID' => $student->studentID, 'courseID' => $course->courseID]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete">Remove</button>
            </form>
            <button class="cancel" onclick="navigateToPage('{{ route('students.courses', ['studentID' => $student->studentID]) }}')">Cancel</button>
        </div>
    </div>

    <script>
        function navigateToPage(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
