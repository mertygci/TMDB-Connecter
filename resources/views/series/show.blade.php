@extends('layouts.app')
@section('title',$series->title)
@section('content')
    <div class="movie-card big"
         style="background-image: url(@background_path($series->background_path);">
        <div>
            <h2>{{ $series->title }}</h2>
            <span>{{$series->first_view}}</span>
            <p>{{$series->description}}</p>
            <a class="watch" style="max-width: 200px;top:200px" href="{{ route('seasons.index', $series->id) }}">View
                Seasons</a>

        </div>
    </div>
@endsection

