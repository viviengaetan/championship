<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Exception;

use App\Tournament\Domain\ValueObject\TeamId;
use Throwable;

class MissingTeamException extends \RuntimeException
{
    public function __construct(TeamId $teamId, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(sprintf('Cannot find Team with id %s', $teamId), $code, $previous);
    }
}
