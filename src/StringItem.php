<?php

declare(strict_types=1);

namespace Listed;

final class StringItem implements Item
{
    public function __construct(
        private string $value,
        private ?self $next = null,
        private ?self $prev = null,
    ) {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function next(): ?StringItem
    {
        return $this->next;
    }

    public function prev(): ?StringItem
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

    public function setNext(?StringItem $item): void
    {
        $this->next = $item;
    }

    public function setPrev(?StringItem $item): void
    {
        $this->prev = $item;
    }
}
