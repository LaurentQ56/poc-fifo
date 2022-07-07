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

    private function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(int $id, string $name): self
    {
        return new self($id, $name);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
