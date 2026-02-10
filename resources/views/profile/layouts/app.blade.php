<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    
    {{-- CSS File --}}
    <link rel="stylesheet" href="{{ asset('Fas/profileStyle.css') }}">
</head>
<body>

    @yield('navbar')
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('scripts')

</body>
</html>