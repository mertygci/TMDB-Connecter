<?php

namespace App\Services;

use App\Repositories\SeriesRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Series;
class SeriesService
{
    protected SeriesRepository $seriesRepository;

    public function __construct(SeriesRepository $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
    }

    public function getAllSeries(): Collection
    {
        return $this->seriesRepository->getAll();
    }

    public function getSeriesById($id)
    {
        return $this->seriesRepository->findById($id);
    }

    public function saveSeries(array $data): Series
    {
        return $this->seriesRepository->save($data);
    }
}
