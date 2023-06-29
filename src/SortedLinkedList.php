<?php

declare(strict_types=1);

namespace Listed;

/**
 * @internal This class only contains sorted linked list logic.
 *           It's type safety is accomplished by strictly typed wrapper classes.
 *
 * @todo Implement internal cursor for optimized insertions and semi sequential reads
 * @todo Implement LAZY/EAGER sort switch
 * @todo Implement custom compare function
 */
class SortedLinkedList implements \IteratorAggregate
{
    private ?Item $first = null;

    private ?Item $last = null;

    private int $count = 0;

    public function get(int $index): mixed
    {
        assert($index >= 0);
        foreach ($this->getIterator() as $i => $value) {
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

    private function getItem(int $index): Item
    {
        assert($index >= 0);

        if ($index === 0) {
            return $this->first;
        }

        $i = 0;
        if ($item = $this->first) {
            do {
                $item = $item->next();
            } while (++$i < $index);
        }

        return $item;
    }

    public function insert(Item $item)
    {
        if ( ! $this->first) {
            ++$this->count;
            $this->first = $item;
            $this->last = $item;

            return;
        }

        $leftIndex = 0;
        $rightIndex = $this->count - 1;

        while ($leftIndex <= $rightIndex) {
            $midIndex = (int) floor(($leftIndex + $rightIndex) / 2);
            $midItem = $this->getItem($midIndex);

            if ($midItem->value() === $item->value()) {
                break;
            } elseif ($midItem->value() < $item->value()) {
                $leftIndex = $midIndex + 1;
            } else {
                $rightIndex = $midIndex - 1;
            }
        }

        if ($midItem->value() < $item->value()) {
            if ($next = $midItem->next()) {
                $next->setPrev($item);
                $item->setNext($next);
            } else {
                $this->last = $item;
            }
            $midItem->setNext($item);
            $item->setPrev($midItem);
        } else {
            if ($prev = $midItem->prev()) {
                $prev->setNext($item);
                $item->setPrev($prev);
            } else {
                $this->first = $item;
            }
            $midItem->setPrev($item);
            $item->setNext($midItem);
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
