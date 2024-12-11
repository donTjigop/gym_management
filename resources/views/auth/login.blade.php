<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

     /* Center the form container */
.login-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
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
.icon img {
    width: 50px;  /* Reduced the size */
    height: 50px; /* Keep the aspect ratio */
    border-radius: 50%;
    background: #f1f1f1;
    padding: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
/* Center the form elements */
.form-label {
    font-weight: 500;
    color: #333;
    margin-bottom: 5px;
    text-align: center;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 16px;
    width: 100%;  /* Ensure the input fields stretch across the container */
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: #1d2671;
    box-shadow: 0 0 5px rgba(29, 38, 113, 0.5);
}

.mb-3 {
    width: 100%;  /* Ensure all form groups take the full width */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.mb-3 label {
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
}

.mb-3 input {
    text-align: center; /* Align the text inside input fields */
}

/* Add some margin to the button and other sections */
.btn-primary {
    background: linear-gradient(to right, #1d2671, #c33764);
    border: none;
    color: #fff;
    padding: 12px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    transition: background 0.3s ease;
    width: 100%; /* Ensure the button stretches across */
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

        .social-login {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .social-login button {
            background: #f1f1f1;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .social-login button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .social-login img {
            width: 25px;
            height: 25px;
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
    <div class="login-container">
        <div class="icon">
            <img src="{{ asset('images/gymlogo.jpg') }}" alt="Logo">
        </div>
        <h2>Login to Your Account</h2>
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-primary">Login</button>
            <div class="social-login">
                <button><img src="{{ asset('images/g icon.jpg') }}" alt="Google"></button>
                <button><img src="{{ asset('images/icon fb.jpg') }}" alt="Facebook"></button>
            </div>
            <div class="text-center">
                <p>Don't have an account? <a href="{{ route('signup.form') }}">Sign up</a></p>
            </div>
        </form>
    </div>
</body>
</html>
