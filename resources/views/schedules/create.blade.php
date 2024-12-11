<!-- resources/views/schedules/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create Schedule')

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
            margin-left: 125px;
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
        }

        .main-content h1 {
            font-size: 28px;
            color: #34495e;
            margin-bottom: 20px;
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
        <h1>Create Schedule</h1>

        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="trainer_id">Select Trainer</label>
                <select name="trainer_id" class="form-control" required>
                    <option value="">Select Trainer</option>
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="day">Day</label>
                <input type="text" name="day" class="form-control" placeholder="e.g., Monday" required>
            </div>

            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" name="time" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Schedule</button>
        </form>
    </div>
@endsection
