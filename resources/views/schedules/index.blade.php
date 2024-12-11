@extends('layouts.app')

@section('title', 'Schedules List')

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
            margin-left: 115px; /* Adjusted space to bring content closer to sidebar */
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
        }

        .main-content h1 {
            font-size: 28px;
            color: #34495e;
            margin-bottom: 20px;
        }

        /* Button styles */
        .btn-primary, .btn-warning, .btn-danger {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Primary button (Add Schedule) */
        .btn-primary {
            background-color: #1abc9c;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #16a085;
        }

        /* Warning button (Edit Schedule) */
        .btn-warning {
            background-color: #f39c12;
            color: white;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        /* Danger button (Delete Schedule - Red) */
        .btn-danger {
            background-color: #e74c3c;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #2c3e50;
            color: white;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 10px;
            }

            .table th, .table td {
                font-size: 14px;
                padding: 8px 10px;
            }

            .btn-primary, .btn-warning, .btn-danger {
                font-size: 12px;
                padding: 6px 10px;
            }
        }
    </style>

    <div class="main-content">
        <h1>Schedules List</h1>

        @if ($schedules->isEmpty())
            <div class="alert alert-info" role="alert">
                No schedules available.
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Trainer</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->trainer->name }}</td>
                            <td>{{ $schedule->day }}</td>
                            <td>{{ $schedule->time }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Add Schedule Button -->
        <a href="{{ route('schedules.create') }}" class="btn btn-primary btn-lg">Add New Schedule</a>
    </div>
@endsection
