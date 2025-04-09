<?php

namespace Sedo\SedoTMP\Exception;

class UnexpectedTypeException extends \UnexpectedValueException
{
    /**
     * @param array<array-key, string|class-string> $expected
     */
    public static function fromMixed(mixed $data, array $expected): self
    {
        if (is_object($data)) {
            $data = get_class($data);
        } else {
            $data = get_debug_type($data);
        }
        $message = sprintf('Expected one of [%s] got %s', implode('|', $expected), $data);

        return new self($message);
    }

    public static function fromInvalidToken(mixed $token): self
    {
        return new self(sprintf('Invalid Token. Expected array{access-token: string, expires_in: integer}. Got [%s]', get_debug_type($token)));
    }

    public static function fromJsonException(\JsonException $e): self
    {
        return new self(sprintf('Invalid JSON: %s', $e->getMessage()));
    }
}
