@extends('layouts.app')

@section('title', 'Create Subscription')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
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

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a.active {
            background-color: #1abc9c;
        }

        .sidebar ul li:hover {
            background-color: #1abc9c;
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

        .main-content {
            margin-left: 125px; /* Adjusted space to bring content closer to sidebar */
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
        }

        .main-content h1 {
            font-size: 28px;
            color: #34495e;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            color: #34495e;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #1abc9c;
        }

        .btn-primary {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            background-color: #1abc9c;
            color: white;
            border: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary:hover {
            background-color: #16a085;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            .form-group input, .form-group select {
                font-size: 14px;
                padding: 8px;
            }

            .btn-primary {
                font-size: 12px;
                padding: 6px 10px;
            }
        }
    </style>

    <div class="main-content">
        <h1>Create New Subscription</h1>

        <form action="{{ route('subscriptions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Subscription Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter subscription name" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" placeholder="Enter price" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration</label>
                <select name="duration" class="form-control" required>
                    <option value="1_week">1 Week</option>
                    <option value="1_month">1 Month</option>
                    <option value="6_months">6 Months</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Subscription</button>
        </form>
    </div>
@endsection
