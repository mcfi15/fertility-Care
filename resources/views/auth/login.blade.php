<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login | {{ $appSetting->website_name ?? 'FertilityCare' }}</title>
    <link rel="shortcut icon" href="{{ asset($appSetting->favicon ?? 'assets/front/img/favicon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f0f4f8;
        }

        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #0f1923 0%, #1a2a3a 50%, #0d4a5c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(33,205,192,0.15) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            animation: float 8s ease-in-out infinite;
        }

        .login-left::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(33,205,192,0.1) 0%, transparent 70%);
            bottom: -100px;
            left: -100px;
            animation: float 6s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, -30px); }
        }

        .left-content {
            max-width: 480px;
            z-index: 1;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .left-content .brand {
            margin-bottom: 40px;
        }

        .left-content .brand img {
            max-height: 60px;
            filter: brightness(0) invert(1);
        }

        .left-content h1 {
            color: #fff;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .left-content p {
            color: rgba(255,255,255,0.7);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .left-content .features {
            margin-top: 40px;
            display: grid;
            gap: 16px;
        }

        .left-content .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.8);
            font-size: 0.95rem;
        }

        .left-content .feature-item .icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(33,205,192,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #21cdc0;
            font-size: 16px;
            flex-shrink: 0;
        }

        .login-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #fff;
        }

        .login-form-wrapper {
            width: 100%;
            max-width: 420px;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .login-form-wrapper .form-header {
            margin-bottom: 32px;
        }

        .login-form-wrapper .form-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 8px;
        }

        .login-form-wrapper .form-header p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 18px;
            pointer-events: none;
            transition: color 0.3s;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px 14px 12px 44px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: #f9fafb;
            outline: none;
        }

        .input-wrapper input:focus {
            border-color: #21cdc0;
            box-shadow: 0 0 0 4px rgba(33,205,192,0.1);
            background: #fff;
        }

        .input-wrapper input.is-invalid {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239,68,68,0.1);
        }

        .input-wrapper .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
        }

        .input-wrapper .toggle-password:hover {
            color: #6b7280;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 4px;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .form-options .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            color: #6b7280;
            cursor: pointer;
        }

        .form-options .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #21cdc0;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, #21cdc0 0%, #1baaa0 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(33,205,192,0.35);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .btn-login .spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        .btn-login.loading .spinner {
            display: inline-block;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.875rem;
            margin-bottom: 20px;
            display: none;
        }

        .alert.show {
            display: block;
            animation: fadeIn 0.3s ease-out;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .error-summary {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        .error-summary ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-summary li {
            color: #991b1b;
            font-size: 0.85rem;
            padding: 2px 0;
        }

        .footer-text {
            text-align: center;
            margin-top: 24px;
            font-size: 0.8rem;
            color: #9ca3af;
        }

        .footer-text a {
            color: #21cdc0;
            text-decoration: none;
        }

        @media (max-width: 900px) {
            .login-left { display: none; }
            .login-right { flex: 1; }
            .login-form-wrapper { max-width: 100%; }
        }

        @media (max-width: 480px) {
            .login-right { padding: 24px; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="left-content">
                <div class="brand">
                    <img src="{{ asset($appSetting->logo ?? 'assets/front/img/logo.png') }}" alt="{{ $appSetting->website_name }}">
                </div>
                <h1>Welcome Back</h1>
                <p>Sign in to manage your fertility care platform, appointments, patients, and website content.</p>
                <div class="features">
                    <div class="feature-item">
                        <div class="icon">&#10003;</div>
                        <span>Manage appointments & bookings</span>
                    </div>
                    <div class="feature-item">
                        <div class="icon">&#10003;</div>
                        <span>Update website content & SEO</span>
                    </div>
                    <div class="feature-item">
                        <div class="icon">&#10003;</div>
                        <span>Track applications & inquiries</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-right">
            <div class="login-form-wrapper">
                <div class="form-header">
                    <h2>Sign In</h2>
                    <p>Enter your credentials to access the admin panel</p>
                </div>

                @if ($errors->any())
                <div class="error-summary">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('status'))
                <div class="alert alert-success show">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <span class="input-icon">&#9993;</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com" class="@error('email') is-invalid @enderror">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">&#128274;</span>
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" class="@error('password') is-invalid @enderror">
                            <button type="button" class="toggle-password" onclick="togglePassword()" id="toggleBtn">&#128065;</button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-login" id="loginBtn">
                        <span class="spinner"></span>
                        <span class="btn-text">Sign In</span>
                    </button>
                </form>

                <div class="footer-text">
                    &copy; {{ date('Y') }} {{ $appSetting->website_name ?? 'FertilityCare' }}. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const btn = document.getElementById('toggleBtn');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                btn.innerHTML = '&#128064;';
            } else {
                pwd.type = 'password';
                btn.innerHTML = '&#128065;';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
            btn.disabled = true;
        });
    </script>
</body>
</html>