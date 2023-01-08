<?php

declare(strict_types=1);
namespace App\Domain\Answers;
use App\Domain\Exception\EntityNotFound;
use App\Domain\Answers\Answer\AnswerId;
use RuntimeException;

interface AnswerRepository
{
    public function add(Answer $answer): Answer;

    public function withAnswerId(AnswerId $answerId): Answer;

    public function remove(Answer $answer): Answer;

    public function withQuestionId($argument1);
}
