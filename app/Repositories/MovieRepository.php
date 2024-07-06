<?php

namespace App\Repositories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieRepository
{
    protected Movie $model;

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function save(array $data): Movie
    {
        return $this->model->create($data);
    }
}
