@extends('layouts.app')
@section('title','Series')
@section('content')
    @foreach($series as $serie)
        <div class="movie-card"
             style="background-image: url(@thumb_path($serie->thumb_path);">
            <div>
                <h2>{{ $serie->title }}</h2>
                <p>{{ $serie->short_description  }}</p>
                <span>{{ $serie->first_view }}</span>
            </div>

            <a href="{{ route('series.show', $serie->id) }}" class="watch">WATCH MOVIE</a>
        </div>
    @endforeach
@endsection
