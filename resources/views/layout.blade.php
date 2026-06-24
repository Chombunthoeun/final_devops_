<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>School Management System</title>
    <style>
        .sidebar {
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 12px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #073e2a;
            color: white;
        }

        .sidebar a:hover {
            background-color: #555;
            color: white;
        }

        .content {
            margin-left: 210px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light px-3">
        <span class="navbar-brand mb-0 h1">School Management System</span>
    </nav>
    <div class="sidebar">
        <a class="active" href="#">Home</a>
        <a href="{{ url('/students') }}">Student</a>
        <a href="{{ url('/teachers') }}">Teacher</a>
        <a href="{{ url('/courses') }}">Courses</a>
        <a href="{{ url('/batches') }}">Batches</a>
        <a href="{{ url('/enrollments') }}">Enrollment</a>
        <a href="{{ url('/payments') }}">Payment</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>