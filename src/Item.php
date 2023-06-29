<?php

declare(strict_types=1);

namespace Listed;

/**
 * @method setNext(Item $item): void;
 */
interface Item
{
    public function value(): int|string;

    public function next(): ?Item;

    public function hasNext(): bool;
}
