<?php

namespace App\Services;

use App\Repositories\MovieRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Movie;
class MovieService
{
    protected MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllMovies(): Collection
    {
        return $this->movieRepository->getAll();
    }

    public function getMovieById($id)
    {
        return $this->movieRepository->findById($id);
    }

    public function saveMovie(array $data): Movie
    {
        return $this->movieRepository->save($data);
    }
}
