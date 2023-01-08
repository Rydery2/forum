<?php

namespace App\Application\Answers;

use App\Application\Command;
use App\Domain\Answers\Answer\AnswerId;

use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\AsResourceObject;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\Attribute;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\ResourceIdentifier;


class ChangeAnswerCommand implements Command
{
    public function __construct(
        private readonly AnswerId $answerId,
        private readonly ?string $body = null
    ) {
    }

    /**
     * answerId
     *
     * @return AnswerId
     */
    public function answerId(): AnswerId
    {
        return $this->answerId;
    }

    /**
     * body
     *
     * @return string|null
     */
    public function body(): ?string
    {
        return $this->body;
    }
}

