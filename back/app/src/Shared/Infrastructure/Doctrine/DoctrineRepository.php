<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManagerInterface;

class DoctrineRepository
{
    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
    }
}
