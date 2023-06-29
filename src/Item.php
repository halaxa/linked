<?php

declare(strict_types=1);

namespace Listed;

/**
 * @method setNext(Item $item): void;
 */
interface Item
{
    public function value(): mixed;

    public function next(): ?Item;

    public function prev(): ?Item;

    public function hasNext(): bool;

    public function hasPrev(): bool;
}
