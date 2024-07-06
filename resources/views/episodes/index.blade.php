@extends('layouts.app')
@section('title',$series->title)
@section('content')
    <div class="movie-card big"
         style="background-image: url(@background_path($series->background_path);">
        <div>
            <h2>{{ $series->title }}</h2>
            <span>{{ $series->first_view }}</span>
            <p>{{ $series->description }}</p>

            <select id="seasonSelect" onchange="changeSeason()">
                @foreach($series->seasons as $seasonItem)
                    <option
                        value="{{ route('episodes.index', [$series->id, $seasonItem->id]) }}"
                        @if($season->id == $seasonItem->id) selected @endif>{{ $seasonItem->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="season">
        @foreach($episodes as $episode)
            <div class="movie-card"
                 style="background-image: @if($episode->still_path) url(@still_path($episode->still_path)) @else url(@still_path($episode->season->thumb_path))  @endif;">
                <div>
                    <h4>Episode - {{ $episode->episode_number }}</h4>
                    <h2>{{ $episode->title }}</h2>
                    <span>{{ $episode->first_view }}</span>
                </div>
                <a href="{{ route('episodes.show', [$series->id, $season->id, $episode->id]) }}" class="watch">WATCH
                    MOVIE</a>
            </div>
        @endforeach
    </div>
@endsection
<script>
    function changeSeason() {
        var selectElement = document.getElementById('seasonSelect');
        var selectedUrl = selectElement.options[selectElement.selectedIndex].value;
        window.location.href = selectedUrl;
    }
</script>
