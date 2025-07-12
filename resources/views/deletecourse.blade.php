<!DOCTYPE html>
<html>
<head>
    <title>Delete Course</title>
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
            width: 50%;
            max-width: 600px;
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
        button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 5px;
        }
        button:hover {
            opacity: 0.9;
        }
        .confirm {
            background-color: #bb8fd9;
            color: white;
        }
        .confirm:hover {
            background-color: #a56cc1;
        }
        .cancel {
            background-color: #f44336;
            color: white;
        }
        .cancel:hover {
            background-color: #e57373;
        }
        a {
            text-decoration: none;
        }
        @media (max-width: 768px) {
            .container {
                width: 80%;
                padding: 20px;
            }
            button {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Course</h1>
        <p>Are you sure you want to delete the course with ID {{ $course->courseID }}?</p>
        
        <form action="{{ route('courses.destroy', $course->courseID) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="confirm">Yes, Delete</button>
            <a href="{{ route('courses.index') }}">
                <button type="button" class="cancel">No, Cancel</button>
            </a>
        </form>
    </div>
</body>
</html>

