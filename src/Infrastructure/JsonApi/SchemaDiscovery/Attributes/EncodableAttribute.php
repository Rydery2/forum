<?php

/**
 * This file is part of forum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Infrastructure\JsonApi\SchemaDiscovery\Attributes;

/**
 * EncodableAttribute
 *
 * @package App\Infrastructure\JsonApi\SchemaDiscovery
 */
interface EncodableAttribute extends PropertyAwareAttribute
{

    /**
     * Retrieves the attribute value from provided object
     *
     * @param object $encodedObject
     * @return mixed
     */
    public function retrieveValue(object $encodedObject): mixed;
}