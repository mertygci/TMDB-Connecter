<?php

namespace Database\Seeders;

use App\Services\SeasonService;
use Illuminate\Database\Seeder;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Log;

class SeasonsTableSeeder extends Seeder
{
    protected TMDBService $tmdbService;
    protected SeasonService $seasonService;
    protected int $seriesId;

    public function __construct(TMDBService $tmdbService, SeasonService $seasonService)
    {
        $this->tmdbService = $tmdbService;
        $this->seasonService = $seasonService;
    }

    public function run($seriesId = null): void
    {
        if ($seriesId) {
            $this->seriesId = $seriesId;
        }

        try {
            $seasons = $this->tmdbService->getSeasons($this->seriesId);

            foreach ($seasons as $season) {
                if (!isset($season['id'])) {
                    continue;
                }

                $this->seasonService->saveSeason([
                    'id' => $season['id'],
                    'series_id' => $this->seriesId,
                    'season_number' => $season['season_number'],
                    'title' => $season['name'],
                    'description' => $season['overview'] ?? null,
                    'thumb_path' => $season['poster_path'],
                    'first_view' => $season['air_date'],
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Season seed does not work correctly: ' . $e->getMessage());
        }
    }
}
