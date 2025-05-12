<!DOCTYPE html>
<html lang="en">
@include('layouts.top')
<style>
    
        :root {
            --primary-green: #2e8b57;
            --dark-green: #1a5c36;
            --light-green: #e8f5e9;
            --lime-green: #7cb342;
            --leaf-green: #558b2f;
            --white: #ffffff;
            --light-gray: #f5f5f5;
            --text-dark: #263238;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              background: 
                linear-gradient(rgba(5, 25, 15, 0.85), rgba(5, 25, 15, 0.85)), 
                url('{{asset('img/bg-img/54.webp')}}') center/cover no-repeat fixed;
            color: var(--text-dark);
        }

        .profile-hero {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .profile-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1534710961216-75c88202f43d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
            filter: blur(5px) brightness(0.7);
            z-index: 1;
        }

        .profile-hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-align: center;
        }

        .profile-container {
            margin-top: -100px;
            position: relative;
            z-index: 3;
        }

        .profile-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: none;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            color: var(--white);
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid var(--white);
            object-fit: cover;
            margin-bottom: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .profile-name {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .profile-body {
            padding: 2rem;
            background-color: var(--white);
        }

        .profile-section {
            margin-bottom: 2rem;
        }

        .section-title {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--lime-green);
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 1.5rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            flex: 1;
            min-width: 120px;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-dark);
            opacity: 0.7;
        }

        .coupon-card {
            border: 1px dashed var(--lime-green);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: rgba(124, 179, 66, 0.05);
            transition: all 0.3s ease;
        }

        .coupon-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .coupon-code {
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
        }

        .coupon-desc {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .plant-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .plant-img {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }

        .plant-body {
            padding: 1rem;
            background-color: var(--white);
        }

        .plant-name {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.5rem;
        }

        .plant-price {
            color: var(--primary-green);
            font-weight: 700;
        }

        .btn-leafy {
            background-color: var(--primary-green);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-leafy:hover {
            background-color: var(--dark-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 139, 87, 0.3);
        }

        .btn-outline-leafy {
            background-color: transparent;
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-leafy:hover {
            background-color: var(--primary-green);
            color: white;
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary-green);
        }

        .nav-pills .nav-link {
            color: var(--text-dark);
        }

        .tab-content {
            padding: 1.5rem 0;
        }

        @media (max-width: 768px) {
            .profile-container {
                margin-top: -50px;
            }
            
            .stats-container {
                flex-direction: column;
            }
            
            .stat-item {
                margin-bottom: 1rem;
            }
        }
    </style>


<body>
@include('layouts.header')

@yield('content')

@include('layouts.footer')

@include('layouts.bottom')

    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('changePasswordBtn').addEventListener('click', function () {
        Swal.fire({
            title: 'Change Password',
            html:
                '<input type="password" id="current_password" class="swal2-input" placeholder="Current Password">' +
                '<input type="password" id="new_password" class="swal2-input" placeholder="New Password">' +
                '<input type="password" id="new_password_confirmation" class="swal2-input" placeholder="Confirm New Password">',
            focusConfirm: false,
            preConfirm: () => {
                const current = document.getElementById('current_password').value;
                const password = document.getElementById('new_password').value;
                const confirm = document.getElementById('new_password_confirmation').value;

                if (!current || !password || !confirm) {
                    Swal.showValidationMessage('All fields are required');
                    return false;
                }

                if (password !== confirm) {
                    Swal.showValidationMessage('Passwords do not match');
                    return false;
                }

                return { current, password, confirm };
            },
            showCancelButton: true,
            confirmButtonText: 'Update Password',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit via AJAX
                fetch("{{ route('password.change.ajax') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        current_password: result.value.current,
                        new_password: result.value.password,
                        new_password_confirmation: result.value.confirm
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Success', data.message, 'success');
                    } else {
                        Swal.fire('Error', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error', 'Something went wrong!', 'error');
                });
            }
        });
    });
</script>

</body>
</html>