@extends('layouts.app')

@section('title', 'Members')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
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

        /* Primary button (Add Member) */
        .btn-primary {
            background-color: #1abc9c;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #16a085;
        }

        /* Warning button (Edit Member) */
        .btn-warning {
            background-color: #f39c12;
            color: white;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        /* Danger button (Delete Member - Red) */
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

        /* Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #2c3e50;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #1abc9c;
            color: white;
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
        <h1>Members List</h1>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Add New Member</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Membership Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->membership_type }}</td>
                        <td>{{ $member->status }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">No members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            {{ $members->links() }}
        </div>
    </div>
@endsection
