<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use PocFifo\Collection;
use PocFifo\Data;

final class CollectionTest extends TestCase
{

    public function testCollectionIn(): void
    {
        // Arrange
        $collection = new Collection();
        $data0 = Data::create(1, 'firstOne');
        $data1 = Data::create(2, 'secondOne');

        // Act
        $collection->in($data0);
        $collection->in($data1);

        // Assert
        self::assertCount(2, $collection->values());
        self::assertSame($data1, $collection->values()[0]);
        self::assertSame($data0, $collection->values()[1]);
        unset($collection, $data0, $data1);
    }

    public function testCollectionOut(): void
    {
        // Arrange
        $collection = new Collection();
        $data0 = Data::create(1, 'firstOne');
        $data1 = Data::create(2, 'secondOne');
        $data2 = Data::create(3, 'thirdOne');
        $data3 = Data::create(4, 'fourthOne');
        $collection->in($data0);
        $collection->in($data1);
        $collection->in($data2);
        $collection->in($data3);

        // Act
        $collection->out();

        // Assert
        self::assertCount(3, $collection->values());
        self::assertSame($data3, $collection->values()[0]);
        self::assertSame($data2, $collection->values()[1]);
        self::assertSame($data1, $collection->values()[2]);

        // Act
        $collection->out();

        // Assert
        self::assertCount(2, $collection->values());
        self::assertSame($data3, $collection->values()[0]);
        self::assertSame($data2, $collection->values()[1]);
    }
}
