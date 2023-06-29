<?php

declare(strict_types=1);

namespace Listed;


/**
 * @internal This class only contains sorted linked list logic.
 *           It's type safety is accomplished by strictly typed wrapper classes.
 */
class SortedLinkedList implements \IteratorAggregate
{
    private ?Item $first = null;

    private ?Item $last = null;

    private int $count = 0;

    private ?int $cursorIndex;

    private Item $cursorValue;

    public function get()
    {

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
            $this->last = $item;
        } else {
            $this->last->setNext($item);
            $this->last = $item;
        }

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
