<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go-Course</title>
    <link rel="shortcut icon" href="{{ asset('/image/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div id="auth">
        @yield('content')
    </div>
</body>

</html>
