<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/sass/app.scss'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 shadow">
        <div class="container-fluid">
           
            <a href="{{ route('main.index') }}" class="navbar-brand">{{ config('app.name') }}</a>
            @if(isset(Auth::user()->name))
            <ul class="navbar-nav me-auto">
                <form class="navbar-item" method="POST" action="{{ route('users.login.logout') }}">
                @csrf
                <button class="btn btn-outline-light" type="submit"><i class="nf nf-md-logout"></i></button>
                </form>
                <a href="{{ route('users.contact.index') }}">
                    <button class="btn btn-outline-success ms-2" type="submit"><i class="nf nf-oct-file_added"></i></button>
                </a>
            </ul>
            @endif
            @if(!isset(Auth::user()->name))
            <ul class="navbar-nav me-auto">
                <a class="btn btn-outline-light" href="{{ route('users.login.index') }}"><i class="nf nf-md-login"></i></a>
            </ul>
            @endif
        </div>
    </nav>
    
    @yield('content')
</body>
</html>