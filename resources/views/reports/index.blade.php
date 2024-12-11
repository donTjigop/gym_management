@extends('layouts.app')

@section('title', 'Transaction Reports')

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
            margin-left: 125px;
            padding: 20px;
            background-color: #fff;
            flex-grow: 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main-content h1 {
            color: #2c3e50;
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Report Filter Form Styles */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-row .col-md-3 {
            flex: 1 1 25%;
        }

        .form-control, .form-select {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;
            padding: 10px;
        }

        .btn-primary {
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 15px;
        }

        .btn-primary:hover {
            background-color: #16a085;
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

            .form-row .col-md-3 {
                flex: 1 1 100%;
            }

            .table th, .table td {
                font-size: 14px;
                padding: 8px 10px;
            }

            .btn-primary {
                font-size: 12px;
                padding: 6px 10px;
            }
        }
    </style>

    <div class="main-content">
        <h1>Transaction Reports</h1>

        <!-- Report Filters Form -->
        <form method="GET" action="{{ route('reports.index') }}" class="mb-4">
            <div class="form-row">
                <div class="col-md-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                    </select>
                </div>
                <div class="col-md-3">
    <label for="member_id">Member</label>
    <select name="member_id" id="member_id" class="form-control">
        <option value="">All Members</option>
        @foreach ($members as $member)
            <option value="{{ $member->id }}" {{ request('member_id') == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
        @endforeach
    </select>
</div>

            </div>
            <button type="submit" class="btn-primary mt-3">Apply Filters</button>
        </form>

        <!-- Report Table -->
        @if ($reportData->isEmpty())
            <div class="alert alert-info" role="alert">
                No reports found for the selected filters.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Report Date</th>
                        <th>Member</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportData as $report)
                        <tr>
                            <td>{{ $report->report_date }}</td>
                            <td>{{ $report->member->name }}</td>
                            <td>{{ $report->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
