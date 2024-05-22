<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\ApiPlatform\Provider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Shared\Application\Query\QueryBusInterface;
use App\Tournament\Application\Query\FindTeamQuery;
use App\Tournament\Domain\ValueObject\TeamId;
use App\Tournament\Infrastructure\ApiPlatform\Resource\TeamResource;
use Symfony\Component\Uid\Uuid;

final readonly class TeamItemProvider implements ProviderInterface
{
    public function __construct(
        private QueryBusInterface $queryBus,
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?TeamResource
    {
        /** @var string $id */
        $id = $uriVariables['id'];
        $team = $this->queryBus->request(new FindTeamQuery(new TeamId(Uuid::fromString($id))));

        return TeamResource::fromModel($team);
    }
}
