<?php

declare(strict_types=1);

namespace ListedTest;

use Listed\IntItem;
use Listed\SortedLinkedList;
use Listed\SortedLinkedListInt;
use Listed\SortedLinkedListString;
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

    /**
     * @dataProvider wrappers
     *
     * @param mixed[] $scalarItems
     *
     * @return void
     */
    public function testWrappersE2E(SortedLinkedListInt|SortedLinkedListString $typedList, array $scalarItems)
    {
        $this->assertCount(0, $typedList);

        $typedList->insert($scalarItems[2]);
        $typedList->insert($scalarItems[0]);
        $typedList->insert($scalarItems[1]);

        $this->assertCount(3, $typedList);

        $this->assertSame($scalarItems[0], $typedList->get(0));
        $this->assertSame($scalarItems[1], $typedList->get(1));
        $this->assertSame($scalarItems[2], $typedList->get(2));

        $this->assertSame($scalarItems[0], $typedList->first());
        $this->assertSame($scalarItems[2], $typedList->last());

        $this->assertInstanceOf(\Iterator::class, $typedList->getIterator());
    }

    public function wrappers()
    {
        return [
            [
                new SortedLinkedListString(),
                [
                    'a',
                    'b',
                    'c',
                ],
            ],
            [
                new SortedLinkedListInt(),
                [
                    1,
                    2,
                    3,
                ],
            ],
        ];
    }
}
