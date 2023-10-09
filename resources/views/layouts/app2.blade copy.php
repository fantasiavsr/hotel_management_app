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
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- Styles -->
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- icon --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <div id="app" class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto me-1">

            <div class="col-12 col-sm-3 col-xl-2 px-sm-2 sticky-top mx-3 my-3 rounded d-flex"
                style="background-color: #FAFAFA">
                {{-- <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 sticky-top mx-3 my-3 rounded" style="background-color: #FAFAFA"> --}}
                <div
                    class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2">
                    <a href="/"
                        class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <span class="fs-5">B<span class="d-none d-sm-inline">rand</span></span>
                    </a>
                    <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
                        id="menu">

                        <li class="nav-item">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark">
                                <span class="ms-1 d-none d-sm-inline fw-semibold">Menu</span>
                            </a>
                        </li>

                        <li class="nav-item rounded" style="background-color: #3974FE">
                            <a href="#" class="nav-link px-sm-3 me-sm-5 text-light">
                                <i class="fs-5 bi-house-fill"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark">
                                <i class="fs-5 bi-clipboard-data-fill"></i><span
                                    class="ms-1 d-none d-sm-inline">Analytics</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark">
                                <i class="fs-5 bi-calendar-check-fill"></i><span
                                    class="ms-1 d-none d-sm-inline">Schedule</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark">
                                <span class="ms-1 d-none d-sm-inline fw-semibold">Account</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1 " id="dropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fs-5 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline">Bootstrap</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </li>

                    </ul>

                    <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1" {{-- style="background-color:coral" --}}>
                        <a href="#"
                            class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28"
                                class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">Joe</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col d-flex flex-column h-sm-100">
                <main class="row overflow-auto">
                    <div class="col pt-4">
                        @yield('content')
                    </div>
                </main>
                {{-- <footer class="row bg-light py-4 mt-auto">
                    <div class="col"> Footer content here... </div>
                </footer> --}}
            </div>
        </div>
    </div>
</body>

</html>
