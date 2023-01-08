<?php

namespace spec\App\Domain\Answers\Events;

use App\Domain\AbstractEvent;
use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Answers\Events\AnswerWasChanged;
use PhpSpec\ObjectBehavior;
use Symfony\Contracts\EventDispatcher\Event;

class AnswerWasChangedSpec extends ObjectBehavior
{
    private  $answerid;
    private $body;


    function  let()
    {
        $this->answerid = new AnswerId();
        $this->body = 'body';
        $this->beConstructedWith($this->answerid,$this->body);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(AnswerWasChanged::class);
    }
    function its_an_event()
    {
        $this->shouldBeAnInstanceOf(Event::class);
        $this->shouldHaveType(AbstractEvent::class);
        $this->occurredOn()->shouldBeAnInstanceOf(\DateTimeImmutable::class);
    }

    function it_has_a_answerid()
    {
        $this->answerid()->shouldBe($this->answerid);
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }
    function it_can_be_converted_to_json()
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            'answerId'=> $this->answerid(),
            'body'=> $this->body()
        ]);
    }

}
