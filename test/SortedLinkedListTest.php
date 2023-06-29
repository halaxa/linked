<?php

declare(strict_types=1);

namespace ListedTest;

use Listed\IntItem;
use Listed\SortedLinkedList;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
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
}
