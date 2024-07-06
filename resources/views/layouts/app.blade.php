<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMDB | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>
<body>

<header>
    <a href="{{ route('series.index') }}" class="{{ request()->route()->getName() == 'series.index' ? 'active' : '' }}">Series</a>
    <a href="{{ route('movies.index') }}" class="{{ request()->route()->getName() == 'movies.index' ? 'active' : '' }}">Movies</a>
</header>

<div class="flex">
    @yield('content')
</div>
</body>
</html>
