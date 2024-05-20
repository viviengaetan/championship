<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Model;

use App\Tournament\Domain\ValueObject\TeamId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Team
{
    #[ORM\Embedded(columnPrefix: false)]
    private readonly TeamId $id;

    function __construct()
    {
        $this->id = new TeamId();
    }

    public function getId(): TeamId
    {
        return $this->id;
    }
}
