<?php

declare(strict_types=1);

namespace Listed;

/**
 * @internal This class only contains sorted linked list logic.
 *           It's type safety is accomplished by strictly typed wrapper classes.
 *
 * @todo Implement internal cursor for optimized insertions and semi sequential reads
 */
class SortedLinkedList implements \IteratorAggregate
{
    private ?Item $first = null;

    private ?Item $last = null;

    private int $count = 0;

    public function get(int $index): mixed
    {
        assert($index >= 0);

        foreach ($this as $i => $value) {
            if ($i === $index) {
                return $value;
            }
        }

        throw new \OutOfBoundsException("Invalid index $index");
    }

    public function first(): mixed
    {
        return $this->first?->value();
    }

    public function last(): mixed
    {
        return $this->last?->value();
    }

    public function insert(Item $item)
    {
        if ( ! $this->first) {
            $this->first = $item;
        } else {
            $this->last->setNext($item);
        }

        $this->last = $item;

        ++$this->count;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function getIterator(): \Generator
    {
        if ($item = $this->first) {
            do {
                yield $item->value();
                $item = $item->next();
            } while ($item !== null);
        }
    }
}
