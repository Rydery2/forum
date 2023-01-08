<?php

namespace spec\App\Application\Answers;

use App\Application\Command;
use App\Application\Answers\PlaceAnswerCommand;
use App\Domain\UserManagement\User\UserId;
use PhpSpec\ObjectBehavior;

class PlaceAnswerCommandSpec extends ObjectBehavior
{
    private $userId;
    private $body;

    function let()
    {
        $this->userId = new UserId();
        $this->body = 'body';
        $this->beConstructedWith($this->userId, $this->body);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PlaceAnswerCommand::class);
    }

    function its_a_command()
    {
        $this->shouldBeAnInstanceOf(Command::class);
    }

    function it_has_a_userId()
    {
        $this->userId()->shouldBe($this->userId);
    }


    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }
}
