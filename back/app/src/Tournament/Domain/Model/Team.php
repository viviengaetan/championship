<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Model;

use App\Tournament\Domain\ValueObject\TeamId;
use App\Tournament\Domain\ValueObject\TeamName;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Team
{
    #[ORM\Embedded(columnPrefix: false)]
    private readonly TeamId $id;

    public function __construct(
        #[ORM\Embedded(columnPrefix: false)]
        private readonly TeamName $name
    ) {
        $this->id = new TeamId();
    }

    public function id(): TeamId
    {
        return $this->id;
    }

    public function name(): TeamName
    {
        return $this->name;
    }
}
