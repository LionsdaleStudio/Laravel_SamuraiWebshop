<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Samurai Webshop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- Navbar (it's not but close enough) --}}
    <h1>@yield('pageTitle')</h1>
    <a href="{{ route('welcome') }}">Home</a>
    <a href="{{ route('swords.index') }}">List all swords</a>
    <a href="{{ route('swords.create') }}">Add new sword</a>
    <hr>
    {{-- End Navbar --}}

    {{-- Main Content --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- End Main Content --}}

</body>

</html>
