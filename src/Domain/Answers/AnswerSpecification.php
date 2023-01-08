<?php


/**
 * This file is part of forum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);
namespace App\Domain\Answers;



interface AnswerSpecification
{
    public function isSatisfiedBy(Answer $answer): bool;
}