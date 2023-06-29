<?php

declare(strict_types=1);

namespace ListedTest;

use Listed\IntItem;
use PHPUnit\Framework\TestCase;

class IntItemTest extends TestCase
{
    public function testValueIsCorrect()
    {
        $item = new IntItem(42);

        $this->assertSame(42, $item->value());
    }

    public function testCorrectlyHandlesNullItem()
    {
        $item = new IntItem(42);

        $this->assertNull($item->next());
    }

    public function testCorrectlyHandlesNotNullItem()
    {
        $nextItem = new IntItem(42);
        $item = new IntItem(42, $nextItem);

        $this->assertSame($nextItem, $item->next());
    }
}
