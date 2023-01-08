<?php

namespace App\Domain\Answers\Votes;

use App\Domain\Answers\Answer\AnswerId;
use App\Domain\UserManagement\User\UserId;


class Vote
{
    public function __construct(
        private AnswerId    $answerId,
        private UserId $userId,
        private int $value
    ) {
        $this->answerId = $answerId;
        $this->userId = $userId;
        $this->value = $value;
    }


    public function answerId() : AnswerId
    {
        return $this->answerId;
    }


    public function userId() : UserId
    {
        return $this->userId;
    }


    public function value() : int
    {
        return $this->value;
    }


    public function upvote() : int
    {
        return $this->value += 1;
    }


    public function downvote() : int
    {
        return $this->value -= 1;
    }

    public function unvote() : int
    {
        return $this->value = 0;
    }

}
