<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | PESO Job Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

        :root {
            --peso-blue-900: #0f2d52;
            --peso-blue-700: #2d65b1;
            --peso-red-600: #d72638;
            --peso-surface: #ffffff;
            --peso-text-muted: #5f6c7a;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: grid;
            place-items: center;
            background: linear-gradient(rgba(246, 248, 252, 0.9), rgba(246, 248, 252, 0.9)),
                        url('{{ asset('images/P1so.png') }}') center center / min(88vw, 980px) auto no-repeat,
                        #f6f8fc;
            position: relative;
            padding: 24px 16px;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            background: radial-gradient(circle at top right, rgba(45, 101, 177, 0.12), transparent 45%),
                        radial-gradient(circle at bottom left, rgba(215, 38, 56, 0.1), transparent 45%);
        }

        .register-card {
            width: min(460px, 100%);
            background: var(--peso-surface);
            border: 1px solid rgba(15, 45, 82, 0.08);
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(15, 45, 82, 0.18);
            padding: clamp(24px, 4vw, 34px);
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 66px;
            height: 66px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 12px;
        }

        .register-title {
            margin: 0;
            text-align: center;
            color: var(--peso-blue-900);
            font-weight: 800;
            font-size: clamp(1.7rem, 4.8vw, 2.2rem);
        }

        .register-subtitle {
            margin: 8px 0 24px;
            text-align: center;
            color: var(--peso-text-muted);
            font-size: 0.98rem;
        }

        .form-label {
            font-weight: 600;
            color: #26313d;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 11px 14px;
            border: 1px solid #ccd3dc;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--peso-blue-700);
            box-shadow: 0 0 0 0.18rem rgba(45, 101, 177, 0.16);
        }

        .register-button {
            width: 100%;
            border: 0;
            border-radius: 10px;
            padding: 12px 16px;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(120deg, #2d65b1, #3b98d4);
            box-shadow: 0 10px 22px rgba(45, 101, 177, 0.28);
        }

        .register-button:hover {
            filter: brightness(1.05);
        }

        .link-muted {
            color: #3186cc;
            text-decoration: none;
            font-weight: 600;
        }

        .link-muted:hover {
            color: #2268a5;
            text-decoration: underline;
        }

        .divider {
            margin: 16px 0;
            border-top: 1px solid #e4e9ef;
        }
    </style>
</head>
<body>
    <main class="register-card" aria-label="Registration form">
        <img src="{{ asset('images/logo.png') }}" alt="PESO Logo" class="brand-logo">
        <h1 class="register-title">Create Account</h1>
        <p class="register-subtitle">Join PESO and find your perfect job</p>

<form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Register as</label>
                <input type="hidden" name="role" value="jobseeker">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a secure password" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="register-button">
                <i class="bi bi-person-plus me-2"></i>Create Account
            </button>
        </form>

        <div class="divider"></div>
        <p class="text-center mb-0" style="color: #5f6c7a;">
            Already have an account? <a href="{{ route('login') }}" class="link-muted">Login</a>
        </p>
    </main>
</body>
</html>
