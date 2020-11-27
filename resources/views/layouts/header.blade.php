<!DOCTYPE html>
<html>
<head>
    <title>Library Bokks</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/assets/css/singin.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap-tools.css" rel="stylesheet" type="text/css">
</head>
<body>
<header class="main-header">
    <div class="container">
        <h1 class="header-title">Library Books</h1>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link custom-link target" href="{{route('books')}}">Books</a></li>
            <li class="nav-item"><a class="nav-link custom-link target" href="{{route('authors')}}">Authors</a></li>
            <li class="nav-item"><a class="nav-link custom-link target" href="{{route('genres')}}">Genres</a></li>

            @if (Route::has('login'))
                @auth
                    <li class="nav-item"><a class="nav-link custom-link target" href="{{route('profile')}}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    {{--                        <li class="nav-item"><a class="nav-link custom-link target" href="{{ url('/home') }}">Home</a></li>--}}
                @else
                    <li class="nav-item"><a class="nav-link custom-link target" href="{{ route('login') }}">Login</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link custom-link target" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </div>
</header>
<main class="main-content">
    <div class="container custom-container">
        <div id="content">
