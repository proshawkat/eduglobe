<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Denova Education | Best Study Abroad Consultants in Bangladesh')</title>
    <meta name="description" content="@yield('description', 'Plan to study in UK, Canada, Australia, USA or Europe? Get expert admission, visa & scholarship support from Denova Education Bangladesh.')">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/jpeg" href="{{ asset('public/images/fav.png') }}">
    @stack('styles')
</head>
<body>
    @yield('content')
    <script src="{{ asset('public/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
