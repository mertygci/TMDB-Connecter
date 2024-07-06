<?php

namespace Database\Seeders;

use App\Services\SeriesService;
use App\Services\SeasonService;
use App\Services\EpisodeService;
use Illuminate\Database\Seeder;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Log;

class SeriesTableSeeder extends Seeder
{
    protected TMDBService $tmdbService;
    protected SeriesService $seriesService;
    protected SeasonService $seasonsService;
    protected EpisodeService $episodeService;

    public function __construct(TMDBService $tmdbService, SeriesService $seriesService, SeasonService $seasonsService, EpisodeService $episodeService)
    {
        $this->tmdbService = $tmdbService;
        $this->seriesService = $seriesService;
        $this->seasonsService = $seasonsService;
        $this->episodeService = $episodeService;
    }

    public function run(): void
    {
        try {
            $seriesList = $this->tmdbService->getSeries();

            foreach ($seriesList['results'] as $series) {
                $seriesId = $series['id'];

                // Diziyi kaydet
                $this->seriesService->saveSeries([
                    'id' => $seriesId,
                    'title' => $series['name'],
                    'description' => $series['overview'],
                    'thumb_path' => $series['poster_path'],
                    'background_path' => $series['backdrop_path'],
                    'first_view' => $series['first_air_date'],
                ]);

                // Sezonları ve bölümleri kaydet
                $this->seedSeasonsAndEpisodes($seriesId);
            }
        } catch (\Exception $e) {
            Log::error('Series seed failed: ' . $e->getMessage());
        }
    }

    protected function seedSeasonsAndEpisodes($seriesId): void
    {
        try {

            $this->call(SeasonsTableSeeder::class, false, ['seriesId' => $seriesId]);

            $this->call(EpisodesTableSeeder::class, false, ['seriesId' => $seriesId]);

        } catch (\Exception $e) {
            Log::error('Failed to seed seasons and episodes: ' . $e->getMessage());
        }
    }
}
