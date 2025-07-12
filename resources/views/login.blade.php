<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            width: 90%;
            max-width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #5c6bc0;
            margin-bottom: 20px;
            text-align: center;
            font-size: 2em;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #7e57c2;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #f06292;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #c2185b;
        }
        .error {
            color: #f44336;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Login</h1>

        <!-- Display any error messages -->
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email input -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Enter your email" required>
            </div>

            <!-- Student ID input -->
            <div class="form-group">
                <label for="password">Student ID:</label>
                <input type="text" name="password" id="password" placeholder="Enter your student ID" required>
            </div>

            <!-- Submit button -->
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
