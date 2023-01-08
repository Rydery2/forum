<?php

namespace App\Domain\Answers\Events;

use App\Domain\AbstractEvent;
use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Questions\Question\QuestionId;
use App\Domain\UserManagement\User\UserId;
use JsonSerializable;

class AnswerWasPlaced extends AbstractEvent implements JsonSerializable
{

    /**
     * Creates a QuestionWasPlaced
     *
     * @param UserId $ownerUserId
     * @param QuestionId $questionId
     * @param AnswerId $answerId
     * @param string $body
     * @param bool $closed
     * @param bool $archived
     */

    public function __construct(
        private readonly UserId $ownerUserId,
        private readonly QuestionId $questionId,
        private readonly AnswerId $answerId,
        private readonly string $body,
        private readonly bool $closed,
        private readonly bool $archived
    )
    {
        parent::__construct();
    }

    /**
     * @return UserId
     */
    public function ownerUserId():UserId
    {
        return $this->ownerUserId;
    }

    public function questionId() : QuestionId
    {
        return $this->questionId;
    }

    public function answerId() : AnswerId
    {
        return $this->answerId;
    }

    public function body()
    {
        return $this->body;
    }

    public function isClosed():bool
    {
        return $this->closed;
    }

    public function isArchived():bool
    {
        return $this->archived;
    }


    public function jsonSerialize():array
    {
        return [
            'ownerUserId' => $this->ownerUserId,
            'questionId' => $this->questionId,
            'answerId' => $this->answerId,
            'body' => $this->body,
            'closed' => $this->closed,
            'archived' => $this->archived
        ];
    }


}
