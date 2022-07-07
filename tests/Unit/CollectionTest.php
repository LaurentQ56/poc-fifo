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
        // Arrange && Act
        $collectionIn = new Collection();
        $data0 = Data::create(1, 'firstOne', $collectionIn);
        $data1 = Data::create(2, 'secondOne', $collectionIn);

        // Assert
        self::assertCount(2, $collectionIn->values());
        self::assertSame($data1, $collectionIn->values()[0]);
        self::assertSame($data0, $collectionIn->values()[1]);
        unset($collectionIn, $data0, $data1);
    }

    public function testCollectionOut(): void
    {
        // Arrange
        $collectionOut = new Collection();
        Data::create(1, 'firstOne', $collectionOut);
        $data1 = Data::create(2, 'secondOne', $collectionOut);
        $data2 = Data::create(3, 'thirdOne', $collectionOut);
        $data3 = Data::create(4, 'fourthOne', $collectionOut);

        // Act
        $collectionOut->out();

        // Assert
        self::assertCount(3, $collectionOut->values());
        self::assertSame($data3, $collectionOut->values()[0]);
        self::assertSame($data2, $collectionOut->values()[1]);
        self::assertSame($data1, $collectionOut->values()[2]);
    }
}
