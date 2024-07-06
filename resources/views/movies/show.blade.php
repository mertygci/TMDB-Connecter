@extends('layouts.app')
@section('title',$movie->title)

@section('content')
    <div class="movie-card big"
         style="background-image: url(@background_path($movie->background_path));">
        <div>
            <h2>{{ $movie->title }}</h2>
            <span>{{ $movie->release_date }}</span>
            <p>{{ $movie->description }}</p>

        </div>
        <a href="#" class="watch" style="max-width:200px">WATCH MOVIE</a>
    </div>
@endsection
