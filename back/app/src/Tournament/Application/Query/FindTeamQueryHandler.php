<?php

declare(strict_types=1);

namespace App\Tournament\Application\Query;

use App\Shared\Application\Query\AsQueryHandler;
use App\Tournament\Domain\Exception\MissingTeamException;
use App\Tournament\Domain\Model\Team;
use App\Tournament\Domain\Repository\TeamRepositoryInterface;

#[AsQueryHandler]
final readonly class FindTeamQueryHandler
{
    public function __construct(
        private TeamRepositoryInterface $teamRepository
    ) {
    }

    public function __invoke(FindTeamQuery $query): Team
    {
        $team = $this->teamRepository->ofId($query->teamId);
        if (null === $team) {
            throw new MissingTeamException($query->teamId);
        }

        return $team;
    }
}
