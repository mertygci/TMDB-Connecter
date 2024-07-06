<?php

namespace App\Services;

use App\Repositories\SeasonRepository;
use App\Models\Season;

class SeasonService
{
    protected SeasonRepository $seasonRepository;

    public function __construct(SeasonRepository $seasonRepository)
    {
        $this->seasonRepository = $seasonRepository;
    }

    public function getSeasonById($id)
    {
        return $this->seasonRepository->findById($id);
    }

    public function getSeasonsBySeriesId($seriesId)
    {
        return $this->seasonRepository->findBySeriesId($seriesId);
    }

    public function saveSeason(array $data): Season
    {
        return $this->seasonRepository->save($data);
    }

}
