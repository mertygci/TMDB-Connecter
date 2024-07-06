@extends('layouts.app')
@section('title','Movies')
@section('content')
    @foreach($movies as $movie)
        <div class="movie-card"
             style="background-image: url(@thumb_path($movie->thumb_path);">
            <div>
                <h2>{{ $movie->title }}</h2>
                <p>{{ Str::limit($movie->description, 50, '...') }}</p>
                <span>{{ $movie->first_view }}</span>
            </div>

            <a href="{{ route('movies.show', $movie->id) }}" class="watch">WATCH MOVIE</a>
        </div>
    @endforeach
@endsection
