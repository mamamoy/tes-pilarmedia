<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Default - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    @yield('styles')
</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
        @include('layouts.sidebar')
        {{-- EndSidebar --}}
        <div id="main">
            {{-- Header --}}
            @include('layouts.header')
            {{-- EndHeader --}}

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Aan Setiawan</p>
                    </div>
                    <div class="float-end">
                        <p>Template by <span class="text-danger"><i class="bi bi-heart"></i></span> <a href="https://zuramai.github.io/mazer/">Mazer</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')

</body>

</html>
