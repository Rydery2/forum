<?php

namespace spec\App\Domain\Answers;

use App\Domain\Answers\Answer;
use App\Domain\Answers\Events\AnswerWasPlaced;
use App\Domain\Questions\Question;
use App\Domain\UserManagement\User;
use App\Domain\Answers\Events\AnswerWasChanged;
use PhpSpec\ObjectBehavior;
use JsonSerializable;
use App\Domain\RootAggregate;


class AnswerSpec extends ObjectBehavior
{
    private $body;



    function let(User $owner, Question $question)
    {
        $owner->userId()->willReturn(new User\UserId());

        $this->body= 'Some Body';
        $this->beConstructedWith($owner,$this->body,$question);

    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Answer::class);
    }



    function it_has_a_answer_id()
    {
        $this->answerId()->shouldBeAnInstanceOf(Answer\AnswerId::class);
    }
    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }
    function it_has_a_owner(User $owner)
    {
        $this->owner()->shouldBe($owner);
    }
    function it_has_a_question(Question $question)
    {
        $this->question()->shouldBe($question);
    }
    function it_has_a_closed_state()
    {
        $this->isClosed()->shouldBe(false);
    }
    function it_has_an_archived_state()
    {
        $this->isArchived()->shouldBe(false);
    }


    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'answerId' => $this->answerId()->getWrappedObject(),
            'body' => $this->body(),
            'owner' => $this->owner()->getWrappedObject(),
            'question' => $this->question()->getWrappedObject(),
            'isClosed' => $this->isClosed(),
            'isArchived' => $this->isArchived(),
        ]);
    }

}
