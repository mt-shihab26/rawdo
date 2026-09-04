<?php

namespace Src\Core\Validation;

class EmailRule implements Rule
{
    /**
     * This rule's name, "email"
     */
    public static function name(): string
    {
        return 'email';
    }

    /**
     * Build the rule; "email" takes no parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self;
    }

    /**
     * Whether the value is a well-formed email address
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * The error message to show when the value isn't a valid email address
     */
    public function message(string $field): string
    {
        return 'Please enter a valid email address.';
    }
}
