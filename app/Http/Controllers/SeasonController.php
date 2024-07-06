<?php

namespace App\Http\Controllers;

use App\Services\SeasonService;
use App\Services\SeriesService;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    protected $seasonService;
    protected $seriesService;

    public function __construct(SeasonService $seasonService, SeriesService $seriesService)
    {
        $this->seasonService = $seasonService;
        $this->seriesService = $seriesService;
    }

    public function index($seriesId)
    {
        $series = $this->seriesService->getSeriesById($seriesId);
        $seasons = $this->seasonService->getSeasonsBySeriesId($seriesId);
        return view('seasons.index', compact('series', 'seasons'));
    }

    public function show($seriesId, $seasonId)
    {
        $series = $this->seriesService->getSeriesById($seriesId);
        $season = $this->seasonService->getSeasonById($seasonId);
        return view('seasons.show', compact('series', 'season'));
    }
}
