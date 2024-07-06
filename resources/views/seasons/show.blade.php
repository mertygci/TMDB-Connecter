@extends('layouts.app')
@section('title',$series->title)
@section('content')
    <div class="movie-card big"
         style="background-image: url(@background_path($season->thumb_path);">
        <div>
            <h2>{{ $series->title }} - Season {{ $season->title }}</h2>
            <span>{{$season->first_view}}</span>
            <p>{{ $season->description }}</p>

            <a class="watch" style="max-width:200px;top:200px"
               href="{{ route('episodes.index', [$series->id, $season->id]) }}">View Episodes</a>
        </div>
    </div>
@endsection


