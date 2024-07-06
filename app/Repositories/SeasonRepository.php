<?php

namespace App\Repositories;

use App\Models\Season;

class SeasonRepository
{
    protected Season $model;

    public function __construct(Season $season)
    {
        $this->model = $season;
    }

    public function save(array $data): Season
    {
        return $this->model->create($data);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function findBySeriesId($seriesId)
    {
        return $this->model->where('series_id', $seriesId)->get();
    }
}
