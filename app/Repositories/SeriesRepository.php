<?php

namespace App\Repositories;

use App\Models\Series;
use Illuminate\Database\Eloquent\Collection;

class SeriesRepository
{
    protected Series $model;

    public function __construct(Series $series)
    {
        $this->model = $series;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function save(array $data): Series
    {
        return $this->model->create($data);
    }
}
