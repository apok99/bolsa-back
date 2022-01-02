<?php

namespace App\CoreContext\Season\Infrastructure\Repositories;

use App\CoreContext\Season\Domain\Entities\Season;
use App\CoreContext\Season\Domain\Entities\SeasonRepository;

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
