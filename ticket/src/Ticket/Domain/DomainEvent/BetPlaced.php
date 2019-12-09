<?php

declare(strict_types=1);

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\Value\Odd;

class BetPlaced extends AggregateChanged
{
    public static function toTicket(Uuid $ticket, string $name, Odd $odd) : self
    {
        return self::occur($ticket->toString(), ['name' => $name, 'odd' => $odd]);
    }

    public function name(): string {
        return $this->payload['name'];
    }

    public function odd() : float {
        return $this->payload['odd'];
    }

    public function ticketId() : Uuid
    {
        return Uuid::fromString($this->aggregateId());
    }
}