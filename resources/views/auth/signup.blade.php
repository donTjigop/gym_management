<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('images/barbel.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            max-width: 450px;
            width: 100%;
            position: relative;
            animation: fadeIn 1s ease-in-out;
            backdrop-filter: blur(10px); /* Optional: adds a blur effect to the background */
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1d2671;
            font-size: 28px;
            font-weight: 700;
        }

        .signup-container .icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .signup-container .icon img {
            width: 50px;  /* Adjusted size */
            height: 50px; /* Adjusted size */
            border-radius: 50%;
            background: #f1f1f1;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            outline: none;
            border-color: #1d2671;
            box-shadow: 0 0 5px rgba(29, 38, 113, 0.5);
        }

        .btn-primary {
            background: linear-gradient(to right, #1d2671, #c33764);
            border: none;
            color: #fff;
            padding: 12px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #c33764, #1d2671);
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .text-center {
            margin-top: 20px;
        }

        .text-center p {
            font-size: 14px;
        }

        .text-center a {
            color: #1d2671;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .text-center a:hover {
            color: #c33764;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="icon">
            <img src="{{ asset('images/gymlogo.jpg') }}" alt="Logo">
        </div>
        <h2>Create an Account</h2>
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" required>
            </div>
            <button type="submit" class="btn-primary">Signup</button>
            <div class="text-center">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
