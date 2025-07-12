<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <style>
        body {
            font-family: "Comic Sans MS", cursive, sans-serif;
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
            width: 40%;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }
        button {
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 10px;
            display: inline-block;
        }
        button:hover {
            opacity: 0.9;
        }
        .confirm {
            background-color: #bb8fd9;
            color: white;
        }
        .cancel {
            background-color: #f44336;
            color: white;
        }
        .cancel-button {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            padding: 12px 25px;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .cancel-button:hover {
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
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Student</h1>
        <p>Are you sure you want to delete the student with ID {{ $student->studentID }}?</p>
        
        <form action="{{ route('students.destroy', $student->studentID) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="confirm">Yes, Delete</button>
            <a href="{{ route('students.index') }}" class="cancel-button">No, Cancel</a>
        </form>
    </div>
</body>
</html>
