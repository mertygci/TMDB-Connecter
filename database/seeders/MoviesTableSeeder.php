<?php

namespace Database\Seeders;

use App\Services\MovieService;
use Illuminate\Database\Seeder;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Log;

class MoviesTableSeeder extends Seeder
{
    protected TMDBService $tmdbService;
    protected MovieService $movieService;

    public function __construct(TMDBService $tmdbService, MovieService $movieService)
    {
        $this->tmdbService = $tmdbService;
        $this->movieService = $movieService;
    }

    public function run()
    {
        try {
            $movies = $this->tmdbService->getMovies();
            //Apiden filmleri çek

            foreach ($movies['results'] as $movie) {
                //Filmleri api datalarıyla kaydet
                $this->movieService->saveMovie([
                    'title' => $movie['title'],
                    'description' => $movie['overview'],
                    'thumb_path' => $movie['poster_path'],
                    'background_path' => $movie['backdrop_path'],
                    'release_date' => $movie['release_date'],
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Movies seed doesnt work correctly: ' . $e->getMessage());
        }
    }
}
