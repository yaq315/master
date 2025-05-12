<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>LeafyLand</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    .cart-area {
        padding: 2rem;
        background: #f9f9f9;
        border-radius: 8px;
    }
    .cart-area h2 {
        margin-bottom: 1rem;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #ddd;
        padding: 0.75rem;
    }
    .table th {
        background-color: #f1f1f1;
    }
    


    .top-header-meta {
    display: flex;
    align-items: center; /* تأكد أن العناصر على نفس المستوى الرأسي */
    gap: 20px; /* المسافة بين عناصر Login وCart */
}
.login, .cart {
    display: flex;
    align-items: center;
}

.login-link, .cart a {
    display: flex;
    align-items: center;
    gap: 6px;
    color: white;
    text-decoration: none;
    font-size: 12px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    margin: 5px;
}

.login-link i,
.cart a i {
    color: #4CAF50;
    font-size: 14px;
}

</style>



</head>