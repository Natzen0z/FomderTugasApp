<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <!-- Bootstrap 5 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    html, body {
        height: 100%;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background: #e9e9e9ff;
    }

    main {
        flex: 1;
    }

    .navbar {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
}

.navbar .nav-link {
    font-size: 1.05rem;
}

.navbar .navbar-brand {
    font-size: 1.3rem;
    font-weight: 700;
}
</style>


</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" 
        style="background-color: #79624dff;">

        <div class="container">

            <a class="navbar-brand fw-bold" href="#">
                Toko Roti Jiya
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/order">Order Now</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/partnership">Partnership</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="{{ route('items.index') }}">
                            Items CRUD
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>

    <!-- CONTENT -->
<main>
    <div class="container py-4">
        @yield('content')
    </div>
</main>


<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <h5 class="fw-bold text-white">Toko Roti Jiya</h5>
                <p class="mb-0 text-white">
                    Freshly baked every morning. Crafted with care, served with warmth.
                </p>
            </div>

            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <p class="mb-1 fw-semibold text-white">Contact Us:</p>
                <p class="mb-0 text-white">+62 812-3456-7890</p>
                <p class="mb-0 text-white">tokorotijiya@example.com</p>
            </div>

        </div>

        <hr class="border-secondary mt-4">

        <div class="text-center text-white">
            © 2025 Toko Roti Jiya — All rights reserved.
        </div>

    </div>
</footer>


    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
