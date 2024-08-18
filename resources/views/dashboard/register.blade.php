<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register - Trucking360 Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/dashboard-style.css') }}" rel="stylesheet">

    <!-- Custom Inline Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Heebo', sans-serif;
        }

        .register-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header h3 {
            font-size: 24px;
            font-weight: 700;
            color: #007bff;
        }

        .register-header i {
            font-size: 36px;
            margin-right: 10px;
        }

        .form-control {
            border-radius: 30px;
        }

        .btn-primary {
            border-radius: 30px;
            padding: 10px 20px;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .register-footer {
            text-align: center;
            margin-top: 20px;
        }

        .register-footer a {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="register-container bg-light shadow-sm rounded">
        <div class="register-header">
            <a href="{{ url('/') }}">
                <h3><i class="fa fa-hashtag"></i> Trucking360</h3>
            </a>
            <h3>Sign Up</h3>
        </div>

        <!-- Display Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                <label for="name">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                <label for="password_confirmation">Confirm Password</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>

        <div class="register-footer">
            <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dashboard-main.js') }}"></script>
</body>

</html>
