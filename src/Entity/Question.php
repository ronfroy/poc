<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Question
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var null|string */
    private $code;

    /** @var Collection&Answer[] */
    private $answers;

    /**
     * self constructor.
     */
    public function __construct()
    {
        $this->answers = new ArrayCollection();
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

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     *
     * @return Question
     */
    public function setCode(?string $code): Question
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Question
     */
    public function setName(string $name): Question
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Answer[]|Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param Answer[]|Collection $answers
     *
     * @return Question
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * @param Answer $answer
     *
     * @return self
     */
    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
        }

        return $this;
    }

    /**
     * @param Answer $answer
     *
     * @return self
     */
    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
        }

        return $this;
    }
}
