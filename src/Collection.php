<?php

declare(strict_types=1);
/*
 * poc-fifo - Collection.php.
 *
 * @author Laurent Quétier <devint.creation@gmail.com>
 *
 * 06/07/2022 18:12
 */

namespace PocFifo;

final class Collection
{
    private static array $values;

    public function __construct()
    {
        self::$values = [];
    }

    public static function in(Data $value): void
    {
        $values = array_reverse(self::$values, false);
        $values[] = $value;

        self::$values = array_reverse($values, false);
    }

    public function out(): self
    {
        array_pop(self::$values);

        return $this;
    }

    public function values(): array
    {
        return self::$values;
    }
}
