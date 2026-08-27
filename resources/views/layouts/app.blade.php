<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="google" content="notranslate">
    <!-- Fonts & Icons -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Main Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/LuxuryThemes.css') }}" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>


    <div class="language-switcher">
        <select id="language-dropdown" onchange="translateLanguage(this.value)" class="notranslate">
            <option value="en">EN</option>
            <option value="ar">AR</option>
            <option value="pt">PT</option>
            <option value="cs">CS</option>
        </select>
    </div>

    <div id="google_translate_element" style="height:0; overflow:hidden;"></div>
    </div>
    <!-- Theme Toggle Button -->
    <button id="theme-toggle" class="theme-toggle"><i class="bi bi-sun"></i></button>

    <div id="app">

        <div class="container-xxl position-relative p-0">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0">
                        <i class="fa fa-utensils me-3"></i>
                        <span class="notranslate">ALBASHA</span>
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                        @if (Auth::check())
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Cart
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="cartDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex justify-content-between align-items-center"
                                            href="{{ route('cart.details', Auth::user()->id) }}">
                                            <span><i class="fas fa-shopping-cart me-2 cart-icon"></i>Cart</span>
                                            @isset($total_price)
                                                <span class="badge bg-primary">${{ number_format($total_price, 2) }}</span>
                                            @endisset
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                    data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu m-0">
                                    <a class="dropdown-item" href="{{ route('orders.my') }}">My Orders</a>
                                    <a class="dropdown-item" href="{{ route('reservation.my') }}">My
                                        Reservations</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form-user').submit();">Logout</a>
                                    <form id="logout-form-user" action="{{ route('logout') }}" method="POST"
                                        class="d-none">@csrf</form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="py-4">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="footer-box">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title">Company</h4>
                            <a class="btn btn-link" href="#">About Us</a>
                            <a class="btn btn-link" href="#">Contact Us</a>
                            <a class="btn btn-link" href="#">Reservation</a>
                            <a class="btn btn-link" href="#">Privacy Policy</a>
                            <a class="btn btn-link" href="#">Terms & Condition</a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title">Contact</h4>
                            <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                            <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                            <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                            <div class="d-flex pt-2">
                                <a class="btn btn-social" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-social" href="#"><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title">Opening</h4>
                            <h5>Monday - Saturday</h5>
                            <p>09AM - 09PM</p>
                            <h5>Sunday</h5>
                            <p>10AM - 08PM</p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title">Newsletter</h4>
                            <p>Stay updated with our latest offers and burgers!</p>
                            <div class="position-relative" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text"
                                    placeholder="Your email">
                                <button type="button"
                                    class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 pt-4 border-top">
                        <div class="col-md-6 text-center text-md-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="#">Home</a>
                                <a href="#">Cookies</a>
                                <a href="#">Help</a>
                                <a href="#">FAQs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a>
        </div>
    </div>

    <!-- Theme Toggle Script -->


    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>



    <!-- Theme Toggle Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.getElementById('theme-toggle');
            const body = document.body;

            if (localStorage.getItem("theme") === "light") {
                body.classList.add("light-mode");
            }

            toggle.addEventListener("click", () => {
                body.classList.toggle("light-mode");
                localStorage.setItem("theme", body.classList.contains("light-mode") ? "light" : "dark");
            });
        });
    </script>

    <!-- Google Translate Element - مخفي لكن ظاهر للمتصفح -->
    <!-- مكانه في الـ body -->
    <!-- Google Translate Container -->


    <script>
        function translateLanguage(lang) {
            const dropdown = document.getElementById('language-dropdown');
            dropdown.setAttribute('data-flag', lang);

            // تنفيذ الترجمة
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            }
        }
    </script>
    <!-- أزرار تغيير اللغة -->
    <!-- Language Switcher Buttons -->


    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>

    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>
