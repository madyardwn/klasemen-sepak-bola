<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Klasemen Sepakbola')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-white">Klasemen</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Klub</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Liga</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main class="container flex-grow-1 mt-4">
        @yield('content')
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top mt-auto">
        <div class="col-md-4 d-flex align-items-center">
            <svg class="" width="30" height="24">
            </svg>
            <span class="mb-3 me-2 lh-1 mb-md-0 text-body-secondary">© 2024 Company, Inc</span>
        </div>
    </footer>
    </script>
</body>

</html>
