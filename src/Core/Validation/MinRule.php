<?php

namespace Src\Core\Validation;

class MinRule implements Rule
{
    /**
     * Hold the minimum length the value's string form must have
     */
    public function __construct(
        private int $min,
    ) {
        //
    }

    /**
     * This rule's name, "min"
     */
    public static function name(): string
    {
        return 'min';
    }

    /**
     * Build the rule from its "min:N" parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self((int) $parameter);
    }

    /**
     * Whether the value's string length is at least the minimum
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return mb_strlen((string) $value) >= $this->min;
    }

    /**
     * The error message to show when the value is too short
     */
    public function message(string $field): string
    {
        return 'The '.str_replace('_', ' ', $field)." must be at least {$this->min} characters.";
    }
}
