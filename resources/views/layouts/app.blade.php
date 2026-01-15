<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Samurai Webshop</title>
    {{-- Bootstrap --}}
    @vite('resources/sass/app.scss')
    {{-- Saját css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- Videó background --}}
    <div class="video-bg">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('storage/vids/japan.mp4') }}" type="video/mp4">
        </video>
    </div>
    
    {{-- Navbar (it's not but close enough) --}}
    <h1>@yield('pageTitle')</h1>
    <a href="{{ route('welcome') }}">Home</a>

    <a href="{{ route('swords.index') }}">List all swords</a>
    
    @can('create', \App\Models\Sword::class)
        <a href="{{ route('swords.create') }}">Add new sword</a>
    @endcan

    <a href="{{ route('swords.trashed') }}">Restore deleted swords</a>
    <a href="{{ route('samurais.index') }}">List all the users of given samurai (many to many relation)</a>
    {{-- Autentikációs útvonalak --}}
    <div class="auth_routes">
        @guest
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endguest
        @auth
            <form action="/logout" method="post">
                @csrf
                <button class="buttonlikea">Logout</button>
            </form>
        @endauth
    </div>


    <hr>
    {{-- End Navbar --}}

    {{-- Main Content --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- End Main Content --}}

</body>

</html>
