<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo app</title>

    <title>@yield('title', 'My Laravel App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    
    {{-- Navbar --}}
    @include('components.navbar')
    <main class="flex-grow">
    {{-- page content --}}
    @yield('content')
    </main>
    {{-- Footer --}}
    @include('components.footer')
</body>
</html>