<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Doctrine;

use App\Shared\Infrastructure\Doctrine\DoctrineRepository;
use App\Tournament\Domain\Model\Team;
use App\Tournament\Domain\Repository\TeamRepositoryInterface;
use App\Tournament\Domain\ValueObject\TeamId;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineTeamRepository extends DoctrineRepository implements TeamRepositoryInterface
{
    private const string ENTITY_CLASS = Team::class;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
    }

    public function ofId(TeamId $id): ?Team
    {
        return $this->entityManager->find(self::ENTITY_CLASS, $id->value);
    }
}
