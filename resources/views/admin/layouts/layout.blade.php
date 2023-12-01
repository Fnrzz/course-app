<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('/image/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @livewireStyles
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @if (auth()->user()->role == 1)
                @include('admin.layouts.sidebar')
            @else
                @include('admin.layouts.owner-sidebar')
            @endif
        </div>
        <div id="main">
            @include('admin.layouts.navbar')
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/trix.js') }}"></script>
    @livewireScripts
</body>

</html>
