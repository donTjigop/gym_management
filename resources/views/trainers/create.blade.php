<!-- resources/views/trainers/create.blade.php -->

@extends('layouts.app')

@section('title', 'Add New Trainer')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        /* Button styles */
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

        /* Form styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            color: #34495e;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group input:focus {
            border-color: #1abc9c;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            .form-group input {
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
        <h1>Add New Trainer</h1>

        <!-- Trainer Form -->
        <form action="{{ route('trainers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Trainer Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="specialty">Specialty</label>
                <input type="text" name="specialty" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Trainer</button>
        </form>
    </div>
@endsection
