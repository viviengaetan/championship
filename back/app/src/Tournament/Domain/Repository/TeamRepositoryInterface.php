<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Repository;

use App\Tournament\Domain\Model\Team;
use App\Tournament\Domain\ValueObject\TeamId;

interface TeamRepositoryInterface
{
    public function ofId(TeamId $id): ?Team;
}
