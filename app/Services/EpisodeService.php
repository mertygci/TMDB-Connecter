<?php

namespace App\Services;

use App\Repositories\EpisodeRepository;
use App\Models\Episode;
class EpisodeService
{
    protected EpisodeRepository $episodeRepository;

    public function __construct(EpisodeRepository $episodeRepository)
    {
        $this->episodeRepository = $episodeRepository;
    }

    public function getEpisodeById($id)
    {
        return $this->episodeRepository->findById($id);
    }

    public function getEpisodesBySeasonId($seasonId)
    {
        return $this->episodeRepository->findBySeasonId($seasonId);
    }

    public function saveEpisode(array $data): Episode
    {
        return $this->episodeRepository->save($data);
    }
}
