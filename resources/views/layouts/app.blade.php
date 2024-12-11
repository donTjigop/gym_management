<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Gym Management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Sidebar styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #2c3e50;
            color: white;
            width: 250px;
            padding: 0px;
            height: 100vh;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #34495e;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sidebar ul li:hover {
            background-color: #1abc9c;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .main-content {
            margin-left: 250px; /* Move the main content to the right of the sidebar */
            padding: 20px;
            flex-grow: 1;
            background-color: #fff;
        }

        .main-content h1 {
            color: #2c3e50;
            font-size: 32px;
        }

        .main-content p {
            font-size: 18px;
            color: #7f8c8d;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            width: 30%; /* Ensure cards are sized appropriately */
            border-radius: 8px;
            text-align: center;
            box-sizing: border-box;
        }

        .card h3 {
            font-size: 24px;
        }

        .card p {
            font-size: 18px;
            color: #7f8c8d;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #1abc9c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .card a:hover {
            background-color: #16a085;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 80%; /* Make cards wider on smaller screens */
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Gym Management System</h2>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('members.index') }}">Members</a></li>
            <li><a href="{{ route('trainers.index') }}">Trainers</a></li>
            <li><a href="{{ route('schedules.index') }}">Schedules</a></li>
            <li><a href="{{ route('subscriptions.index') }}">Subscriptions</a></li>
            <li><a href="{{ route('payments.index') }}">Payments</a></li>
            <li><a href="{{ route('reports.index') }}">Reports</a></li>
            <li><a href="{{ route('settings.index') }}">Settings</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="width: 100%; padding: 10px; text-align: left;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>
