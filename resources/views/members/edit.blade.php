<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #1d2671, #c33764);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }
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

        .edit-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            max-width: 450px;
            width: 100%;
        }
        .edit-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1d2671;
            font-size: 28px;
            font-weight: 700;
        }
        .form-label, .form-control, .btn-primary, .btn-secondary {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }
        .form-control {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .btn-primary, .btn-secondary {
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .btn-primary {
            background: linear-gradient(to right, #1d2671, #c33764);
            color: #fff;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #c33764, #1d2671);
        }
        .btn-secondary {
            background: #e0e0e0;
            color: #333;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #ccc;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="edit-container">
    <h2>Edit Member</h2>

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Specify PUT method -->

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $member->address) }}" class="form-control" required>
        </div>

       <!-- Membership Type Dropdown -->
       <div class="mb-3">
                <label for="membership_type" class="form-label">Membership Type</label>
                <select name="membership_type" id="membership_type" class="form-control" required>
                    <option value="basic">Basic</option>
                    <option value="premium">Premium</option>
                    <option value="VIP">VIP</option>
                </select>
            </div>

            <!-- Status Dropdown -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="suspended">Suspended</option>
                </select>
            </div>

        <button type="submit" class="btn-primary">Update Member</button>
        <a href="{{ route('members.index') }}" class="btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
