<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #5c6bc0;
            color: white;
            padding: 15px 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }

        header i {
            font-size: 50px;
            margin-right: 15px;
            margin-left: 20px;
            margin-right: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-left: auto;
            margin-right: 20px;
            padding: 10px 20px;
            background-color: #f06292;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        header a:hover {
            background-color: #c2185b;
        }

        nav {
            background-color: #7e57c2;
            color: white;
            padding: 10px 0;
            margin: 20px 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        section .card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            width: 90%;
            max-width: 700px;
            text-align: left;
        }

        section .card h2 {
            color: #5c6bc0;
            margin-top: 0;
        }

        section .card p {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        footer {
            background-color: #7e57c2;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }

        footer a {
            color: #f4f4f9;
            text-decoration: none;
            margin: 0 5px;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <i class="fas fa-book icon"></i>
        <h1>Welcome, Admin!</h1>
        <a href="{{ route('logout') }}">Logout</a>
    </header>

    <section>
        <div class="card">
            <h2>Dashboard</h2>
            <p>Welcome to the admin dashboard. Here you can manage students and courses.</p>
            <nav>
                <ul>
                    <li><a href="{{ route('students.index') }}"><i class="fas fa-user-graduate icon"></i>Manage Students</a></li>
                    <li><a href="{{ route('courses.index') }}"><i class="fas fa-book icon"></i>Manage Courses</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <footer>
        <p>© 2024 Student Information System | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a> | <a href="#">Contact Us</a></p>
    </footer>
</body>
</html>
