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
    private array $values;

    public function __construct()
    {
        $this->values = [];
    }

    public function in(Data $value): void
    {
        $values = array_reverse($this->values, false);
        $values[] = $value;

        $this->values = array_reverse($values, false);
    }

    public function out(): self
    {
        array_pop($this->values);

        return $this;
    }

    public function values(): array
    {
        return $this->values;
    }
}
