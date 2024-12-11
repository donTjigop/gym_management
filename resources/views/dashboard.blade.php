<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: #2c3e50;
            color: white;
            width: 250px;
            padding: 0;
            height: 100vh;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            color: #fff;
            margin: 20px 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
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
            display: block;
        }

        .sidebar form {
            margin: 0;
        }

        .sidebar button {
            width: 100%;
            padding: 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
        }

        .sidebar button:hover {
            background-color: #c0392b;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #fff;
            flex-grow: 1;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 32px;
            margin: 0;
        }

        .logout-button {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .logout-button:hover {
            background-color: #c0392b;
        }

        /* Summary Section */
        .summary {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .summary .card {
            width: 30%;
            text-align: center;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 8px;
        }

        .summary .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .summary .card p {
            font-size: 24px;
            font-weight: bold;
        }

        .summary .card .green {
            color: #27ae60;
        }

        .summary .card .blue {
            color: #2980b9;
        }

        .summary .card .purple {
            color: #8e44ad;
        }

        /* Container for Cards */
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            flex: 1 1 calc(30% - 20px);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .card h3 {
            font-size: 20px;
        }

        .card p {
            font-size: 16px;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .summary {
                flex-direction: column;
                align-items: center;
            }

            .summary .card {
                width: 80%;
                margin-bottom: 20px;
            }

            .container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 80%;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
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
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header with Logout Button -->
        <div class="header">
            <h1>Welcome to the Gym Dashboard!</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

        <div class="summary">
            <div class="card">
                <h3>Total Income</h3>
                <p class="green">₱{{ number_format($totalIncome ?? 0, 2) }}</p>
            </div>
           
            <div class="card">
                <h3>Total Trainers</h3>
                <p class="purple">{{ $totalTrainers ?? 0 }}</p>
            </div>
            <div class="card">
                <h3>Total Members</h3>
                <p class="blue">{{ $totalMembers ?? 0 }}</p>
            </div>
        </div>

        <div class="container">
        <div class="card">
                <h3>Manage Subscriptions</h3>
                <a href="{{ route('subscriptions.index') }}">Go to Subscriptions</a>
            </div>
            <div class="card">
                <h3>Manage Members</h3>
                <a href="{{ route('members.index') }}">Go to Members</a>
            </div>
            <div class="card">
                <h3>Manage Trainers</h3>
               
                <a href="{{ route('trainers.index') }}">Go to Trainers</a>
            </div>
            <div class="card">
                <h3>Manage Payments</h3>
                <a href="{{ route('payments.index') }}">Go to </a>
            </div>
            <div class="card">
                <h3>Manage Schedules</h3>
               
                <a href="{{ route('schedules.index') }}">Go to Schedules</a>
            </div>
        </div>
    </div>

</body>
</html>
