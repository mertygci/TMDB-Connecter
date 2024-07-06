<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class TMDBService
{
    const API_URL = 'https://api.themoviedb.org/3';
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    /**
     * @throws Exception
     */
    public function getMovies()
    {
        $response = Http::get(self::API_URL . "/movie/popular?api_key={$this->apiKey}");

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new Exception('Failed to fetch movies: ' . $response->body());
        }
    }

    /**
     * @throws Exception
     */
    public function getSeries()
    {
        $response = Http::get(self::API_URL . "/tv/popular?api_key={$this->apiKey}");

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new Exception('Failed to fetch series: ' . $response->body());
        }
    }

    /**
     * @throws Exception
     */
    public function getSeasons($seriesId)
    {
        $response = Http::get(self::API_URL . "/tv/{$seriesId}?api_key={$this->apiKey}");

        if ($response->successful()) {
            return $response->json()['seasons'] ?? [];
        } else {
            throw new Exception('Failed to fetch seasons: ' . $response->body());
        }
    }

    /**
     * @throws Exception
     */
    public function getEpisodes($seriesId, $seasonNumber)
    {
        $response = Http::get(self::API_URL . "/tv/{$seriesId}/season/{$seasonNumber}?api_key={$this->apiKey}");

        if ($response->successful()) {
            return $response->json()['episodes'] ?? [];
        } else {
            throw new Exception('Failed to fetch episodes: ' . $response->body());
        }
    }
}
