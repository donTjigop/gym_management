@extends('layouts.app')

@section('title', 'Edit Payment')

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
        <h1>Edit Payment</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="member_id">Select Member</label>
        <select name="member_id" class="form-control" required>
            <option value="">Select Member</option>
            @foreach($members as $member)
                <option value="{{ $member->id }}" {{ $payment->member_id == $member->id ? 'selected' : '' }}>
                    {{ $member->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" class="form-control" value="{{ old('amount', $payment->amount) }}" required>
    </div>

    <div class="form-group">
        <label for="payment_date">Payment Date</label>
        <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $payment->payment_date ? $payment->payment_date->format('Y-m-d') : '') }}" required>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Payment</button>
</form>

    </div>
@endsection
