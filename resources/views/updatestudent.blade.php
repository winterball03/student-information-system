<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
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
            width: 80%;
            max-width: 800px;
            max-height: 80vh; /* Set a maximum height for the container */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-y: auto; /* Enable vertical scrolling within the container */
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }
        input, select {
            width: 100%;
            padding: 12px;
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
            padding: 10px 20px;
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
            padding: 10px 20px;
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
                width: 95%;
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
        <h1>Update Student</h1>
        <form action="{{ route('students.update', $student->studentID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" value="{{ $student->studentID }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $student->name }}" required>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="{{ $student->phoneNumber }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $student->email }}" required>
            </div>

            <div class="buttons-container">
                <button type="submit">Update Student</button>
                <a href="{{ route('students.index') }}" class="cancel-button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
