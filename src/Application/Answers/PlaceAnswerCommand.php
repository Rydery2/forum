<?php

namespace App\Application\Answers;


use App\Application\Command;
use App\Domain\UserManagement\User\UserId;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\AsResourceObject;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\Attribute;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\RelationshipIdentifier;

class PlaceAnswerCommand implements Command
{
    public function __construct(
        #[RelationshipIdentifier(name: "owner",className: UserId::class, type: 'users')]
        private readonly UserId $ownerUserId,

        #[Attribute(required: true)]
        private readonly string $body
    ){

    }

    public function userId() : UserId
    {
        return $this->ownerUserId;
    }


    public function body(): string
    {
        return $this->body;
    }
}
