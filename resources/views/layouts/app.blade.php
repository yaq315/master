<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('layouts.top')

<style>

    /* ================ [ أساسيات التصميم ] ================ */
:root {
    /* الألوان الرئيسية */
    --primary-color: #2e7d32;  /* الأخضر الأساسي */
    --primary-light: #81c784;  /* أخضر فاتح */
    --primary-dark: #1b5e20;   /* أخضر غامق */
    --secondary-color: #558b2f; /* أخضر ثانوي */
    --accent-color: #7cb342;   /* لمسة لونية */
    --text-dark: #263238;      /* للنصوص الغامقة */
    --text-light: #eceff1;     /* للنصوص الفاتحة */
    --background-light: #f1f8e9; /* خلفية فاتحة */
    --background-dark: #e8f5e9;  /* خلفية غامقة قليلاً */
    --error-color: #d32f2f;    /* للتنبيهات الخطأ */
    --warning-color: #ffa000;  /* للتنبيهات التحذير */
    --success-color: #388e3c;  /* للتنبيهات النجاح */
}

/* ================ [ إعادة تعيين الأساسيات ] ================ */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
    font-size: 16px;
}

body {
    font-family: 'Tajawal', 'Segoe UI', sans-serif;
    line-height: 1.6;
    color: var(--text-dark);
    background-color: var(--background-light);
    direction: rtl;
}

/* ================ [ الطباعة ] ================ */
@media print {
    body {
        background: none;
        color: #000;
    }
    .no-print {
        display: none !important;
    }
}

/* ================ [ الروابط والأزرار ] ================ */
a {
    color: var(--primary-color);
    text-decoration: none;
    transition: all 0.3s ease;
}

a:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

.btn {
    padding: 0.5rem 1.5rem;
    border-radius: 50px;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn-outline {
    background-color: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.btn-outline:hover {
    background-color: var(--primary-color);
    color: white;
}

/* ================ [ شريط التنقل ] ================ */


/* ================ [ بطاقات التصميم ] ================ */
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 1.5rem;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.card-header {
    background-color: var(--primary-color);
    color: white;
    padding: 1.25rem;
    border-bottom: none;
}

.card-body {
    padding: 1.5rem;
}

/* ================ [ الصفحة الرئيسية ] ================ */
.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: url('../images/leaf-pattern.png') no-repeat;
    opacity: 0.1;
    z-index: 0;
}

.hero-content {
    position: relative;
    z-index: 1;
}

/* ================ [ الملف الشخصي ] ================ */
.profile-avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.profile-header {
    text-align: center;
    margin-bottom: 2rem;
}

.profile-stats {
    display: flex;
    justify-content: space-around;
    text-align: center;
    margin: 2rem 0;
}

.stat-item {
    padding: 1rem;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-dark);
    opacity: 0.8;
}

/* ================ [ النماذج ] ================ */
.form-control {
    border-radius: 8px;
    padding: 0.75rem 1rem;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-light);
    box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.25);
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
    display: block;
}

/* ================ [ التذييل ] ================ */
.footer {
    background-color: var(--primary-dark);
    color: white;
    padding: 3rem 0 1.5rem;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.8);
    transition: all 0.3s ease;
}

.footer-links a:hover {
    color: white;
    text-decoration: none;
    padding-right: 5px;
}

.social-icons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    margin-left: 10px;
    transition: all 0.3s ease;
}

.social-icons a:hover {
    background-color: var(--primary-light);
    transform: translateY(-3px);
}

/* ================ [ تأثيرات خاصة ] ================ */
.leaf-decoration {
    position: absolute;
    opacity: 0.1;
    z-index: 0;
}

.leaf-1 {
    top: 10%;
    left: 5%;
    transform: rotate(45deg);
}

.leaf-2 {
    bottom: 15%;
    right: 8%;
    transform: rotate(-20deg);
}

/* ================ [ الوسائط المتعددة ] ================ */
@media (max-width: 768px) {
    .navbar-brand {
        font-size: 1.2rem;
    }
    
    .hero-section {
        padding: 3rem 0;
    }
    
    .profile-stats {
        flex-direction: column;
    }
    
    .stat-item {
        margin-bottom: 1rem;
    }
}

</style>
<body class="bg-light-green">
    <!-- شريط التنقل العلوي -->

@include('layouts.header')


    <!-- المحتوى الرئيسي -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- التذييل -->
  
@include('layouts.footer')


<@include('layouts.bottom')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // تحديث عداد السلة عند تحميل الصفحة
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                updateCartCount(data.count);
            });
    });
    
    function updateCartCount(count) {
        const cartQuantityElements = document.querySelectorAll('.cart-quantity');
        cartQuantityElements.forEach(el => {
            el.textContent = `(${count})`;
        });
    }
    </script>


</html>