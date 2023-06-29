<?php

declare(strict_types=1);

namespace Listed;

final class IntItem implements Item
{
    public function __construct(
        private int $value,
        private ?self $next = null,
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

    public function hasNext(): bool
    {
        return $this->next !== null;
    }

    public function setNext(IntItem $item): void
    {
        $this->next = $item;
    }
}
