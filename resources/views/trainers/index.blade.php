@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
    <style>
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
            margin-left: 115px;
            padding: 20px;
            background-color: #fff;
            flex-grow: 1;
        }

        .main-content h1 {
            color: #2c3e50;
            font-size: 32px;
            margin-bottom: 20px;
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
        
        /* Button styles */
        .btn-primary, .btn-warning, .btn-danger {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Button Styling */
        .btn-primary {
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
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
        <h1>Trainers List</h1>
        
        <!-- Add New Trainer Button -->
        <a href="{{ route('trainers.create') }}" class="btn-primary">Add New Trainer</a>

        <!-- Trainers Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trainers as $trainer)
                    <tr>
                        <td>{{ $trainer->id }}</td>
                        <td>{{ $trainer->name }}</td>
                        <td>{{ $trainer->specialty }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-warning">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this trainer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">No trainers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
