<?php

declare(strict_types=1);

namespace Listed;

/**
 * @internal This class only contains sorted linked list logic.
 *           It's type safety is accomplished by strictly typed wrapper classes.
 */
class SortedLinkedList
{
    private ?Item $first = null;

    private ?Item $last = null;

    private int $count = 0;

    public function first(): ?Item
    {
        return $this->first;
    }

    public function last(): ?Item
    {
        return $this->last;
    }

    public function insert(Item $item)
    {
        ++$this->count;
    }

    public function count(): int
    {
        return $this->count;
    }
}
