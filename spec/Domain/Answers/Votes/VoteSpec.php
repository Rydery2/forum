<?php

namespace spec\App\Domain\Answers\Votes;

use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Answers\Votes\Vote;
use App\Domain\UserManagement\User\UserId;
use PhpSpec\ObjectBehavior;

class VoteSpec extends ObjectBehavior
{
    private AnswerId $answerId;
    private UserId $userId;
    private int $value;

    function let()
    {

        $this->answerId = new AnswerId();
        $this->userId = new UserId();
        $this->value = 1;
        $this->beConstructedWith($this->answerId, $this->userId, $this->value);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Vote::class);
    }

    function it_has_a_answerId()
    {
        $this->answerId()->shouldBe($this->answerId);
    }

    function it_has_a_userId()
    {
        $this->userId()->shouldBe($this->userId);
    }

    function it_has_a_value($value)
    {
        $this->value($value)->shouldBe($this->value);
    }


    function it_can_be_upvoted($value) {
        $this->upvote($value)->shouldBe($this->value += 1);
    }


    function it_can_be_downvoted($value)
    {
        $this->downvote($value)->shouldBe($this->value -= 1);
    }

    function it_can_be_unvoted($value)
    {
        $this->unvote($value)->shouldBe($this->value = 0);
    }


}
