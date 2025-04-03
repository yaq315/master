<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | LeafyLand</title>
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
        .login-container {
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

        .login-container:hover {
            transform: translateY(-0.5rem);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        /* ===== Typography ===== */
        h2 {
            color: var(--primary-green);
            margin-bottom: 1.8rem;
            font-size: clamp(1.75rem, 4vw, 2rem);
            font-weight: 700;
            text-align: center;
            letter-spacing: 0.5px;
        }

        /* ===== Form Elements ===== */
        .input-container {
            position: relative;
            margin-bottom: 1.25rem;
        }

        .input-container input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid transparent;
            border-radius: 0.75rem;
            font-size: 1rem;
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

        /* ===== Decorative Elements ===== */
        .leaf {
            position: fixed;
            opacity: 0.7;
            z-index: -1;
            animation: float 8s infinite ease-in-out;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            pointer-events: none;
            display: none;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-1.5rem) rotate(5deg); }
        }

        /* ===== Responsive Breakpoints ===== */
        @media (min-width: 768px) {
            .login-container {
                padding: 3rem 2.5rem;
            }
            
            .leaf {
                display: block;
            }
            
            .leaf:nth-child(1) {
                top: 15%;
                left: 10%;
                width: 2.5rem;
                animation-delay: 0s;
            }
            
            .leaf:nth-child(2) {
                top: 70%;
                left: 12%;
                width: 3rem;
                animation-delay: 2s;
            }
            
            .leaf:nth-child(3) {
                top: 30%;
                right: 10%;
                width: 2.8rem;
                animation-delay: 4s;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 0.8rem;
            }
            
            .login-container {
                padding: 2rem 1.5rem;
                border-radius: 1rem;
            }
            
            .input-container input {
                padding: 0.9rem 0.9rem 0.9rem 2.8rem;
                font-size: 0.95rem;
            }
            
            .input-container i {
                left: 1rem;
                font-size: 1rem;
            }
            
            button {
                padding: 0.9rem;
                font-size: 1rem;
            }
        }

        /* ===== Accessibility Improvements ===== */
        @media (prefers-reduced-motion) {
            .login-container, button, .leaf {
                transition: none;
                animation: none;
            }
        }

        /* ===== Dark Mode Support ===== */
        @media (prefers-color-scheme: dark) {
            .input-container input {
                background: rgba(30, 30, 30, 0.9);
                color: #f0f0f0;
            }
        }
    </style>
</head>
<body>
   
    @include('layouts.header')

    <!-- Decorative Leaves -->
  

    <main class="login-container">
        <h2>login</h2>

        @if ($errors->any())
            <div class="error" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" autocomplete="on">
            @csrf

            <div class="input-container">
                <i class="fas fa-envelope" aria-hidden="true"></i>
                <input type="email" name="email" placeholder="Email" required aria-label="Email address">
            </div>

            <div class="input-container">
                <i class="fas fa-lock" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Password" required aria-label="Password">
            </div>

            <button type="submit" aria-label="Login button">
                Sign In
            </button>
        </form>

        <p>New to LeafyLand? <a href="{{ route('register') }}">Join our community</a></p>
    </main>
    @include('layouts.bottom')
  
</body>
</html>