<?php

declare(strict_types=1);

namespace ListedTest;

use Listed\IntItem;
use Listed\SortedLinkedList;
use PHPUnit\Framework\TestCase;

class SortedLinkedListTest extends TestCase
{
    public function testCountIncrementsOnInsert()
    {
        $list = new SortedLinkedList();
        $this->assertSame(0, $list->count());
        $item = new IntItem(42);

        $list->insert($item);
        $this->assertSame(1, $list->count());

        $list->insert($item);
        $this->assertSame(2, $list->count());
    }

    public function testFirstAndLastReturnNullOnEmptyList()
    {
        $list = new SortedLinkedList();

        $this->assertNull($list->first());
        $this->assertNull($list->last());
    }

    public function testKeepsItemsSortedOnInsert()
    {
        $list = new SortedLinkedList();

        $list->insert(new IntItem(3));
        $list->insert(new IntItem(1));
        $list->insert(new IntItem(2));

        $this->assertSame([1, 2, 3], iterator_to_array($list));
    }

    public function testGetReturnsCorrectItem()
    {
        $list = new SortedLinkedList();

        $list->insert(new IntItem(1));
        $list->insert(new IntItem(2));
        $list->insert(new IntItem(3));

        $this->assertSame(1, $list->get(0));
        $this->assertSame(2, $list->get(1));
        $this->assertSame(3, $list->get(2));
    }

    public function testGetThrowsOutOfBoundsOnEmptyList()
    {
        $this->expectException(\OutOfBoundsException::class);
        (new SortedLinkedList())->get(0);
    }

    public function testGetThrowsOutOfBoundsOnNonExistingIndex()
    {
        $this->expectException(\OutOfBoundsException::class);

        $list = new SortedLinkedList();

        $list->insert(new IntItem(3));
        $list->get(1);
    }

    public function testIteratorIsEmptyOnEmptyList()
    {
        $this->assertSame([], iterator_to_array(new SortedLinkedList()));
    }

    public function testInsertSetsFirstAndLastCorrectly()
    {
        $list = new SortedLinkedList();

        $list->insert(new IntItem(3));
        $list->insert(new IntItem(1));
        $list->insert(new IntItem(2));

        $this->assertSame(1, $list->first());
        $this->assertSame(3, $list->last());
    }
}
