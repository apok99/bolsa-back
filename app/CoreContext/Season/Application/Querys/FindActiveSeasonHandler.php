<?php

namespace App\CoreContext\Season\Application\Querys;

use App\CoreContext\Season\Domain\Entities\SeasonRepository;

class FindActiveSeasonHandler
{
    private SeasonRepository $seasonRepository;

    public function __construct(SeasonRepository $seasonRepository)
    {
        $this->seasonRepository = $seasonRepository;
    }

    public function handle(FindActiveSeason $findActiveSeason)
    {
        return $this->seasonRepository->getActiveSeason();
    }
}
