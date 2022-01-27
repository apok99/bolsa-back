<?php
namespace App\CoreContext\Season\Application\Command;

use App\CoreContext\Season\Domain\Entity\SeasonRepository;
use App\CoreContext\User\Domain\Entity\UserRepository;

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
            'end_date' => (new \Datetime('first day of next month'))->format('Y-m-d 00:00:00'),
            'created_at' => $createSeasonCommad->now() ?? new \Datetime()
        ];

        $this->seasonRepository->create($newSeasons);

    }

}
