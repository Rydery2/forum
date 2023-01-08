<?php

namespace App\Domain\Answers\Events;
use App\Domain\AbstractEvent;
use App\Domain\DomainEvent;
use App\Domain\Answers\Answer\AnswerId;
use JsonSerializable;
class AnswerWasRemoved extends AbstractEvent implements \JsonSerializable
{
    /**
     * Creates a AnswerWasRemoved
     *
     * @param AnswerId $answerId
     */
    public function __construct(private readonly AnswerId $answerId)
    {
        parent::__construct();
    }

    public function answerid():AnswerId
    {
        return $this->answerId;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'answerId' => $this->answerId
        ];
    }

}
