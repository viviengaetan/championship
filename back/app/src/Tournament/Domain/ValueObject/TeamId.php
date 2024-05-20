<?php

declare(strict_types=1);

namespace App\Tournament\Domain\ValueObject;

use App\Shared\Domain\AggregateRootId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class TeamId implements \Stringable
{
    use AggregateRootId;
}
