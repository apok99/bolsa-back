<?php
namespace App\CoreContext\Season\Applicaction\Command;

use App\CoreContext\Season\Domain\Entities\SeasonRepository;
use App\CoreContext\Users\Domain\Entities\UserRepository;

class CreateSeasonCommandHandler
{
    public SeasonRepository $seasonRepository;
    private UserRepository $userRepository;

    public function __construct(SeasonRepository $seasonRepository, UserRepository $userRepository)
    {
        $this->seasonRepository = $seasonRepository;
        $this->userRepository = $userRepository;
    }

    public function handle(CreateSeasonCommand $createSeasonCommad)
    {

        $season = $this->seasonRepository->getActiveSeason();

        if($season){
            $season->active = false;
            $season->end_date = $createSeasonCommad->now();
            $this->seasonRepository->save($season);
            $this->userRepository->resetSeasonWallets();
        }

        $newSeasons = [
            'name' => 'Season '.(($season->id ?? 0) + 1),
            'start_date' => $createSeasonCommad->now(),
            'active' => true,
            'end_date' => null,
            'created_at' => $season->now()
        ];

        $this->seasonRepository->create($newSeasons);

    }

}
