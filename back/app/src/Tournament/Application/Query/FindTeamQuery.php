<?php

declare(strict_types=1);

namespace App\Tournament\Application\Query;

use App\Shared\Application\Query\QueryInterface;
use App\Tournament\Domain\ValueObject\TeamId;

final readonly class FindTeamQuery implements QueryInterface
{
    public function __construct(
        public TeamId $teamId
    ) {
    }
}
