<?php

namespace Src\Core\Validation;

class MaxRule implements Rule
{
    /**
     * Hold the maximum length the value's string form may have
     */
    public function __construct(
        private int $max,
    ) {
        //
    }

    /**
     * This rule's name, "max"
     */
    public static function name(): string
    {
        return 'max';
    }

    /**
     * Build the rule from its "max:N" parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self((int) $parameter);
    }

    /**
     * Whether the value's string length is at most the maximum
     *
     * @param  array<string, mixed>  $data
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return mb_strlen((string) $value) <= $this->max;
    }

    /**
     * The error message to show when the value is too long
     */
    public function message(string $field): string
    {
        return 'The '.str_replace('_', ' ', $field)." must be at most {$this->max} characters.";
    }
}
