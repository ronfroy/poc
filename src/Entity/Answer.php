<?php

declare(strict_types=1);

namespace App\Entity;

class Answer
{
    /** @var int */
    private $id;

    /** @var Question */
    private $question;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Question
     */
    public function getQuestion(): Question
    {
        return $this->question;
    }

    /**
     * @param Question $question
     *
     * @return Answer
     */
    public function setQuestion(Question $question): Answer
    {
        $this->question = $question;

        return $this;
    }
}
