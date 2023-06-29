<?php

declare(strict_types=1);

namespace Listed;

class SortedLinkedListString implements \Countable, \IteratorAggregate
{
    private SortedLinkedList $list;

    public function __construct()
    {
        $this->list = new SortedLinkedList();
    }

    public function get(int $index): string
    {
        return $this->list->get($index);
    }

    public function first(): ?string
    {
        return $this->list->first();
    }

    public function last(): ?string
    {
        return $this->list->last();
    }

    public function insert(string $item)
    {
        $this->list->insert(new StringItem($item));
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
