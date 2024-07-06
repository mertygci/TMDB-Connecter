<?php

namespace App\Repositories;

use App\Models\Episode;

class EpisodeRepository
{
    protected Episode $model;

    public function __construct(Episode $episode)
    {
        $this->model = $episode;
    }

    public function save(array $data): Episode
    {
        return $this->model->create($data);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function findBySeasonId($seasonId)
    {
        return $this->model->where('season_id', $seasonId)->get();
    }


}
