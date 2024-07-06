@extends('layouts.app')
@section('title',$series->title)
@section('content')
    <div class="movie-card big"
         style="background-image: @if($episode->still_path) url(@still_path($episode->still_path)) @else url(@still_path($episode->season->thumb_path))  @endif;">
        <div class="col-md-8">
            <h2>{{ $series->title }} - Season {{ $season->season_number }} - Episode {{ $episode->episode_number }}</h2>
            <span>{{ $episode->title }}</span>
            <h4 style="color: white">{{ $episode->first_view }}</h4>
            <p>{{ $episode->description }}</p>

        </div>
        <a href="#" class="watch" style="max-width:200px">WATCH MOVIE</a>
    </div>
@endsection
