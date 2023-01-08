<?php

namespace App\Domain\Answers;

use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Questions\Question;
use App\Domain\UserManagement\User;
use JsonSerializable;


class Answer implements JsonSerializable
{


    private Question $question;
    private AnswerId $answerId;
    /**
     * @var false
     */
    private bool $isClosed = false;
    /**
     * @var false
     */
    private bool $isArchived = false;
    private User $owner;
    private string $body;

    public function __construct(
        User $owner,
        string $body,
        Question $question
    )
    {
        $this->owner = $owner;
        $this->body = $body;
        $this->question = $question;
        $this->answerId = new Answer\AnswerId();
        $this->isClosed = false;
        $this->isArchived = false;
    }

    public function answerId() : AnswerId
    {
        return $this->answerId;
    }

    public function body() : string
    {
        return $this->body;
    }

    public function owner() : User
    {
        return $this->owner;
    }

    public function question()  : Question
    {
        return $this->question;
    }

    public function isClosed() : bool
    {
        return $this->isClosed;
    }

    public function isArchived() : bool
    {
        return $this->isArchived;
    }

    public function jsonSerialize() :mixed
    {
        return [
            'answerId' => $this->answerId,
            'body' => $this->body,
            'owner' => $this->owner,
            'question' => $this->question,
            'isClosed' => $this->isClosed,
            'isArchived' => $this->isArchived,
        ];
    }

}
