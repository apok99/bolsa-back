<?php

namespace App\CoreContext\Season\Domain\Entities;

interface SeasonRepository
{

    public function getActiveSeason();

    public function save(Season $season);

    public function create(array $newSeasons);

}
