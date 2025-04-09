<?php

namespace Sedo\SedoTMP\Exception;

use Sedo\SedoTMP\OpenApi\Content\Model\Problem as ContentProblem;
use Sedo\SedoTMP\OpenApi\Platform\Model\Problem as PlatformProblem;

class ProblemResponseException extends \UnexpectedValueException
{
    public ContentProblem|PlatformProblem $problem;

    public function __construct(
        ContentProblem|PlatformProblem $problem,
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
    ) {
        $this->problem = $problem;
        parent::__construct($message, $code, $previous);
    }

    public static function fromProblem(ContentProblem|PlatformProblem $problem): self
    {
        $message = sprintf('Response contains a Problem: %s: %s', $problem->getTitle(), $problem->getStatus());

        return new self($problem, $message);
    }
}
