<?php

namespace Database\Seeders;

use App\Services\EpisodeService;
use Illuminate\Database\Seeder;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Log;

class EpisodesTableSeeder extends Seeder
{
    protected TMDBService $tmdbService;
    protected EpisodeService $episodeService;
    protected int $seriesId;

    public function __construct(TMDBService $tmdbService, EpisodeService $episodeService)
    {
        $this->tmdbService = $tmdbService;
        $this->episodeService = $episodeService;
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
                $episodes = $this->tmdbService->getEpisodes($this->seriesId, $season['season_number']);

                if (is_array($episodes)) {
                    foreach ($episodes as $episode) {
                        $this->episodeService->saveEpisode([
                            'season_id' => $season['id'],
                            'episode_number' => $episode['episode_number'],
                            'title' => $episode['name'],
                            'description' => $episode['overview'],
                            'still_path' => $episode['still_path'],
                            'first_view' => $episode['air_date'],
                        ]);
                    }
                } else {
                    throw new \Exception('Invalid response format');
                }
            }

        } catch (\Exception $e) {
            Log::error('Failed to seed episodes: ' . $e->getMessage());
        }
    }
}
