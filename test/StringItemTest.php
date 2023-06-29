<?php

declare(strict_types=1);

namespace ListedTest;

use Listed\StringItem;
use PHPUnit\Framework\TestCase;

class StringItemTest extends TestCase
{
    public function testValueIsCorrect()
    {
        $item = new StringItem('val');

        $this->assertSame('val', $item->value());
    }

    public function testCorrectlyHandlesNullItem()
    {
        $item = new StringItem('val');

        $this->assertNull($item->next());
        $this->assertFalse($item->hasNext());
    }

    public function testCorrectlyHandlesNotNullItem()
    {
        $nextItem = new StringItem('next');
        $item = new StringItem('val', $nextItem);

        $this->assertSame($nextItem, $item->next());
        $this->assertTrue($item->hasNext());
    }
}
