<?php

declare(strict_types=1);

namespace App\Entity;

class Locale
{
    /** @var int */
    private $id;

    /** @var string */
    private $code;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Locale
     */
    public function setCode(string $code): Locale
    {
        $this->code = $code;

        return $this;
    }
}
