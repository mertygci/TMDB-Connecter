<?php

namespace App\Http\Controllers;

use App\Services\SeriesService;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    protected $seriesService;

    public function __construct(SeriesService $seriesService)
    {
        $this->seriesService = $seriesService;
    }

    public function index()
    {
        $series = $this->seriesService->getAllSeries();
        return view('series.index', compact('series'));
    }

    public function show($seriesId)
    {
        $series = $this->seriesService->getSeriesById($seriesId);
        return view('series.show', compact('series'));
    }
}
