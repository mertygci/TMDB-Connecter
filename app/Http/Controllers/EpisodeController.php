<?php

namespace App\Http\Controllers;

use App\Services\EpisodeService;
use App\Services\SeasonService;
use App\Services\SeriesService;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    protected $episodeService;
    protected $seasonService;
    protected $seriesService;

    public function __construct(EpisodeService $episodeService, SeasonService $seasonService, SeriesService $seriesService)
    {
        $this->episodeService = $episodeService;
        $this->seasonService = $seasonService;
        $this->seriesService = $seriesService;
    }

    public function index($seriesId, $seasonId)
    {
        $series = $this->seriesService->getSeriesById($seriesId);
        $season = $this->seasonService->getSeasonById($seasonId);
        $episodes = $this->episodeService->getEpisodesBySeasonId($seasonId);
        return view('episodes.index', compact('series', 'season', 'episodes'));
    }

    public function show($seriesId, $seasonId, $episodeId)
    {
        $series = $this->seriesService->getSeriesById($seriesId);
        $season = $this->seasonService->getSeasonById($seasonId);
        $episode = $this->episodeService->getEpisodeById($episodeId);
        return view('episodes.show', compact('series', 'season', 'episode'));
    }
}
