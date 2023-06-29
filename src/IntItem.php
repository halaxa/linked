<?php

declare(strict_types=1);

namespace Listed;

final class IntItem implements Item
{
    public function __construct(
        private int $value,
        private ?self $next = null,
        private ?self $prev = null,
    ) {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function next(): ?IntItem
    {
        return $this->next;
    }

    public function prev(): ?IntItem
    {
        return $this->prev;
    }

    public function hasNext(): bool
    {
        return $this->next !== null;
    }

    public function hasPrev(): bool
    {
        return $this->prev !== null;
    }

    public function setNext(?IntItem $item): void
    {
        $this->next = $item;
    }

    public function setPrev(?IntItem $item): void
    {
        $this->prev = $item;
    }
}
