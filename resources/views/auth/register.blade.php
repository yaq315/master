<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register | LeafyLand</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    @include('layouts.top')
   
    <style>
        /* ===== Base Styles ===== */
        :root {
            --primary-green: #4CAF50;
            --dark-green: #2E7D32;
            --light-green: #A5D6A7;
            --error-red: #FF5252;
            --success-teal: #69F0AE;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: 
                linear-gradient(rgba(5, 25, 15, 0.85), rgba(5, 25, 15, 0.85)), 
                url('{{asset('img/bg-img/54.webp')}}') center/cover no-repeat fixed;
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            line-height: 1.6;
        }

        /* ===== Main Container ===== */
        .register-container {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 1.2rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 28rem;
            padding: 2.5rem 2rem;
            margin: 1.5rem auto;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            margin-top: 200px;
        }

        .register-container:hover {
            transform: translateY(-0.5rem);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        /* ===== Typography ===== */
        h2 {
            color: var(--primary-green);
            margin-bottom: 1.5rem;
            font-size: clamp(1.75rem, 4vw, 2rem);
            font-weight: 700;
            text-align: center;
            letter-spacing: 0.5px;
        }

        /* ===== Form Elements ===== */
        .input-container {
            position: relative;
            margin-bottom: 1rem;
        }

        .input-container input {
            width: 100%;
            padding: 0.9rem 0.9rem 0.9rem 3rem;
            border: 2px solid transparent;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-container input:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .input-container i {
            position: absolute;
            left: 1.1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-green);
            font-size: 1.1rem;
        }

        button {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 0.75rem;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
            letter-spacing: 0.5px;
        }

        button:hover {
            background: linear-gradient(135deg, #43A047, #1B5E20);
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        /* ===== Feedback Messages ===== */
        .error {
            color: var(--error-red);
            background: rgba(255, 255, 255, 0.1);
            padding: 0.75rem;
            border-radius: 0.5rem;
            border-left: 4px solid var(--error-red);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .success {
            color: var(--success-teal);
            background: rgba(255, 255, 255, 0.1);
            padding: 0.75rem;
            border-radius: 0.5rem;
            border-left: 4px solid var(--success-teal);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        /* ===== Links & Text ===== */
        p {
            margin-top: 1.5rem;
            font-size: 0.95rem;
            text-align: center;
        }

        a {
            color: var(--light-green);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        a:hover {
            color: var(--primary-green);
            text-decoration: underline;
        }

        /* ===== Password Strength Meter ===== */
        .password-strength {
            height: 4px;
            background: #ddd;
            border-radius: 2px;
            margin: 0.5rem 0 1rem;
            overflow: hidden;
        }

        .strength-meter {
            height: 100%;
            width: 0;
            transition: width 0.3s;
        }

        /* ===== Responsive Breakpoints ===== */
        @media (min-width: 768px) {
            .register-container {
                padding: 2.5rem;
            }
            
            .input-container {
                margin-bottom: 1.25rem;
            }
            
            .input-container input {
                padding: 1rem 1rem 1rem 3rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 2rem 1.5rem;
                margin-top: 90px;
            }
            
            .input-container input {
                padding: 0.8rem 0.8rem 0.8rem 2.8rem;
            }
        }
    </style>
</head>
<body>
   
    @include('layouts.header')

    <main class="register-container">
        <h2>Join LeafyLand</h2>

        @if ($errors->any())
            <div class="error" role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" autocomplete="on">
            @csrf

            <div class="input-container">
                <i class="fas fa-user" aria-hidden="true"></i>
                <input type="text" name="name" placeholder="Full Name" required aria-label="Full name" value="{{ old('name') }}">
            </div>

            <div class="input-container">
                <i class="fas fa-envelope" aria-hidden="true"></i>
                <input type="email" name="email" placeholder="Email" required aria-label="Email address" value="{{ old('email') }}">
            </div>

            <div class="input-container">
                <i class="fas fa-lock" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Password" required aria-label="Password" id="password">
            </div>

          

            <div class="input-container">
                <i class="fas fa-lock" aria-hidden="true"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required aria-label="Confirm password">
            </div>

            <button type="submit" aria-label="Register button">
                Create Account
            </button>
        </form>

        <p>Already have an account? <a href="{{ route('login') }}">login</a></p>
    </main>
    @include('layouts.bottom')
    <script>
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.getElementById('strength-meter');
    
    </script>
  
</body>
</html>