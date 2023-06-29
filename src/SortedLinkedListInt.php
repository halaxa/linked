<?php

declare(strict_types=1);

namespace Listed;

class SortedLinkedListInt implements \Countable, \IteratorAggregate
{
    private SortedLinkedList $list;

    public function __construct()
    {
        $this->list = new SortedLinkedList();
    }

    public function get(int $index): int
    {
        return $this->list->get($index);
    }

    public function first(): ?int
    {
        return $this->list->first();
    }

    public function last(): ?int
    {
        return $this->list->last();
    }

    public function insert(int $item)
    {
        $this->list->insert(new IntItem($item));
    }

    public function count(): int
    {
        return $this->list->count();
    }

    public function getIterator(): \Generator
    {
        return $this->list->getIterator();
    }
}
