<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\ApiPlatform\Resource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Tournament\Domain\Model\Team;
use App\Tournament\Infrastructure\ApiPlatform\Provider\TeamItemProvider;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    shortName: 'Team',
    operations: [
        new Get(
            provider: TeamItemProvider::class
        ),
        new GetCollection(
        )
    ]
)]
final class TeamResource
{
    public function __construct(
        #[ApiProperty(readable: false, writable: false, identifier: true)]
        public ?AbstractUid $id = null,
        #[Assert\NotNull(groups: ['create'])]
        #[Assert\Length(min: 1, max: 255, groups: ['create', 'Default'])]
        public ?string $name = null,
    ) {
    }

    public static function fromModel(Team $team): self
    {
        return new self(
            $team->id()->value,
            $team->name()->value
        );
    }
}
