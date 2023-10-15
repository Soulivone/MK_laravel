<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('css')

    <style>
        body {
            background: #fff;
        }

        .nav-left .nav-link.active {
            background: black !important;
            border-radius: 10px;
        }

        .nav-left .nav-link.active i,
        .nav-left .nav-link.active span {
            color: white !important;
        }

        .nav-left .nav-link:hover {
            background: #444444;
            border-radius: 10px;
        }

        .nav-left .nav-link:hover i,
        .nav-left .nav-link:hover span {
            color: white !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                @auth('admin')
                    <!-- Sidebar -->
                    <aside class="col-md-2 fixed-start p-0 d-none d-md-block bg-white"
                        style="height: 100vh; border-right: 1px solid #c7c8c9">
                        <div class="sidebar-sticky">
                            <div class="sidenav-header px-4 pt-4 pb-5">
                                <a class="navbar-brand text-wrap" href="{{ route('admin.home') }}">
                                    <h4 class="font-weight-bold m-0 fw-bold">Admin MK SHOP</h4>
                                </a>
                            </div>

                            <div class="sidenav-content px-4">
                                <ul class="nav flex-column sidebar-body">
                                    {{-- Dashboard --}}
                                    <li class="nav-item nav-left mb-1">
                                        <a class="nav-link d-flex p-2 {{ Route::is('admin.home') ? 'active' : '' }}"
                                            href="{{ route('admin.home') }}">
                                            <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; border-radius: 10px">
                                                <i class="fa-solid fa-house text-black"></i>
                                            </div>
                                            <span class="nav-link-text ms-1 align-self-center text-black">Dashboard</span>
                                        </a>
                                    </li>

                                    {{-- Admin --}}
                                    <li class="nav-item nav-left mb-1">
                                        <a class="nav-link d-flex p-2 {{ Request::is('admin/admin*') ? 'active' : '' }}" href="{{ route('admin.admin.index') }}">
                                            <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; border-radius: 10px">
                                                <i class="fa-solid fa-user text-black"></i>
                                            </div>
                                            <span class="nav-link-text ms-1 align-self-center text-black">Admin</span>
                                        </a>
                                    </li>

                                    {{-- User --}}
                                    <li class="nav-item nav-left mb-1">
                                        <a class="nav-link d-flex p-2 {{ Request::is('admin/user*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                                            <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; border-radius: 10px">
                                                <i class="fa-solid fa-users text-black"></i>
                                            </div>
                                            <span class="nav-link-text ms-1 align-self-center text-black">User</span>
                                        </a>
                                    </li>

                                    {{-- Category --}}
                                    <li class="nav-item nav-left mb-1">
                                        <a class="nav-link d-flex p-2 {{ Request::is('admin/category*') ? 'active' : '' }}" href="{{ route('admin.category.index') }}">
                                            <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; border-radius: 10px">
                                                <i class="fa-solid fa-layer-group text-black"></i>
                                            </div>
                                            <span class="nav-link-text ms-1 align-self-center text-black">Category</span>
                                        </a>
                                    </li>

                                    {{-- Product --}}
                                    <li class="nav-item nav-left mb-1">
                                        <a class="nav-link d-flex p-2 {{ Route::is('admin.product') ? 'active' : '' }}"
                                            href="{{ url('dashboard') }}" style="padding-left: 35px">
                                            <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; border-radius: 10px">
                                                <i class="fa-solid fa-store text-black"></i>
                                            </div>
                                            <span class="nav-link-text ms-1 align-self-center text-black">Product</span>
                                        </a>
                                    </li>

                                    {{-- Order --}}
                                    <li class="nav-item nav-left mb-1">
                                        <a class="nav-link d-flex p-2 {{ Route::is('admin.order') ? 'active' : '' }}"
                                            href="{{ url('dashboard') }}" style="padding-left: 35px">
                                            <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; border-radius: 10px">
                                                <i class="fa-solid fa-boxes-stacked text-black"></i>
                                            </div>
                                            <span class="nav-link-text ms-1 align-self-center text-black">Order</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </aside>
                @endauth

                <!-- Main content -->
                @auth('admin')
                    <main role="main" class="col-md ml-sm-auto col-lg">
                        <div class="container-fluid">
                            <div class="main-nav d-flex justify-content-between py-3">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav align-self-center">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav">
                                    <!-- Authentication Links -->
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="main-content py-4">
                                @yield('content')
                            </div>
                        </div>
                    </main>
                @else
                    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 d-flex v-100" style="height: 100vh;">
                        <div class="container d-flex flex-column">
                            <div class="main-content py-5">
                                @yield('content')
                            </div>
                        </div>
                    </main>
                @endauth
            </div>
        </div>
    </div>
    @yield('script')
</body>

</html>
