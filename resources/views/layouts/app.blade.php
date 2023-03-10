<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @yield('css')
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        <!--::header part start::-->
        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <h2 class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Yukmoco') }}</h2>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="menu_icon"><i class="fas fa-bars"></i></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Kategori
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                            <a class="dropdown-item" href="category.html"> shop category</a>
                                            <a class="dropdown-item" href="single-product.html">product details</a>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="hearer_icon d-flex">
                                <div class="nav-item dropdown">
                                    <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                                </div>
                                <div class="nav-item dropdown" style="padding-left:20px">
                                    @if (isset(auth()->user()->name))
                                    <span><i class="fas fa-user"></i>
                                        {{auth()->user()->name}}
                                    </span>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{route('informasi-akun',['id'=>auth()->user()->id])}}">Informasi
                                            Akun</a>
                                        <a class="dropdown-item" href="{{route('logout')}}">logout</a>
                                    </div>
                                    @else
                                    <a href=""><i class="fas fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('login')}}">login</a>
                                        <a class="dropdown-item" href="{{route('register')}}">register</a>
                                    </div>
                                    @endif


                                </div>
                                <div class="nav-item dropdown">
                                    <a href="/keranjang"><i class="fas fa-cart-plus"> </i> <span
                                            class='badge badge-warning' id='lblCartCount'>{{session()->get('cart') !=
                                            null?
                                            count(session()->get('cart')):'' }}</span></a>

                                </div>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="search_input" id="search_input_box">
                <div class="container ">
                    <form action="/pencarian" method="GET" class="d-flex justify-content-between search-inner">
                        <input type="text" name="cari" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
        </header>
        <!-- Header part end-->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer_part">
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> Yukmoco - All rights reserved | Template by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @yield('javascript')
</body>

</html>