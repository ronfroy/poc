<?php

declare(strict_types=1);

namespace App\Entity;

class Answer
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

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

    /**
     * @param string $name
     *
     * @return Answer
     */
    public function setName(string $name): Answer
    {
        $this->name = $name;

        return $this;
    }
}
