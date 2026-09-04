<?php

namespace Src\Core\Validation;

class BoolRule implements Rule
{
    /**
     * This rule's name, "bool"
     */
    public static function name(): string
    {
        return 'bool';
    }

    /**
     * Build the rule; "bool" takes no parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self;
    }

    /**
     * Whether the value is a recognized boolean representation (true, false, 1, 0, "on", "off", "yes", "no", etc.)
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null;
    }

    /**
     * The error message to show when the value isn't a valid boolean representation
     */
    public function message(string $field): string
    {
        return 'The '.str_replace('_', ' ', $field).' must be true or false.';
    }
}
