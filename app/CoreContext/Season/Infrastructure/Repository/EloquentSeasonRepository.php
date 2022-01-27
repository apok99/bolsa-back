<?php

namespace App\CoreContext\Season\Infrastructure\Repository;

use App\CoreContext\Season\Domain\Entity\Season;
use App\CoreContext\Season\Domain\Entity\SeasonRepository;

class EloquentSeasonRepository implements SeasonRepository
{

    public function save(Season $season)
    {
        return $season->save();
    }

    public function getActiveSeason()
    {
        return Season::where('active', true)->first();
    }

    public function create(array $newSeasons)
    {
        return Season::insert($newSeasons);
    }

}
