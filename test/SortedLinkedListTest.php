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

        $list->insert(new IntItem(1));
        $list->insert(new IntItem(2));
        $list->insert(new IntItem(3));

        $this->assertSame([1,2,3], iterator_to_array($list));

        $this->markTestIncomplete();
    }

    public function testIteratorIsEmptyOnEmptyList()
    {
        $this->assertSame([], iterator_to_array(new SortedLinkedList()));
    }
}
