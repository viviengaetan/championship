<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Symfony\Messenger;

use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Application\Query\QueryInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerQueryBus implements QueryBusInterface
{
    use HandleTrait;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    /**
     * @template T
     * @param QueryInterface<T> $query
     * @return T
     */
    public function request(QueryInterface $query): mixed
    {
        return $this->handle($query);
    }
}
