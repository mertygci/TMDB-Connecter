@extends('layouts.app')
@section('title',$series->title)

@section('content')
    <div class="movie-card big"
         style="background-image: url(@background_path($series->background_path);">
        <div>
            <h2>Seasons of {{ $series->title }}</h2>
            <span>{{$series->first_view}}</span>
            <p>{{$series->description}}</p>
        </div>
    </div>
    <div class="season">
        @foreach($seasons as $season)
            <div class="movie-card"
                 style="background-image: url(@thumb_path($season->thumb_path));">
                <div>
                    <h4>Season {{ $season->season_number }}</h4>
                    <span>{{$season->first_view}}</span>
                    <p>{{ Str::limit($season->description, 50, '...') }}</p>

                </div>
                <a href="{{ route('seasons.show', [$series->id, $season->id]) }}" class="watch">WATCH MOVIE</a>
            </div>
        @endforeach
    </div>
@endsection
