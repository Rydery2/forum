<?php

namespace App\Domain\Answers;

use App\Domain\Answers\Answer\AnswerId;
use App\Domain\Questions\Question;
use App\Domain\UserManagement\User;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\AsResourceObject;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\Attribute;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use JsonSerializable;


#[
    Entity,
    Table(name: 'answers')
]
#[AsResourceObject(type: 'answers',links: [AsResourceObject::LINK_SELF],isCompound: true)]
class Answer implements JsonSerializable
{

    #[Id, GeneratedValue(strategy: 'NONE') , Column(name: 'id', type: 'QuestionId')]
    private Question $question;
    #[Id, GeneratedValue(strategy: 'NONE') , Column(name: 'id', type: 'AnswerId')]
    private AnswerId $answerId;
    /**
     * @var false
     */
    #[Column( type: 'boolean', options:['default' => 0])]
    #[Attribute (name:'isClosed')]
    private bool $isClosed = false;
    /**
     * @var false
     */
    #[Column( type: 'boolean', options:['default' => 0])]
    #[Attribute (name:'isArchived')]
    private bool $isArchived = false;
    #[Id, GeneratedValue(strategy: 'NONE') , Column(name: 'id', type: 'UserId')]
    private User $owner;
    #[Column(type: 'text')]
    #[Attribute (name:'body')]
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
