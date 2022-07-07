<?php

declare(strict_types=1);
/*
 * poc-fifo - Data.php.
 *
 * @author Laurent Quétier <devint.creation@gmail.com>
 *
 * 06/07/2022 17:17
 */

namespace PocFifo;

final class Data
{
    private int $id;
    private string $name;

    private function __construct(int $id, string $name, Collection $collection)
    {
        $this->id = $id;
        $this->name = $name;
        $collection::in($this);
    }

    public static function create(int $id, string $name, Collection $collection): self
    {
        return new self($id, $name, $collection);
    }
}
