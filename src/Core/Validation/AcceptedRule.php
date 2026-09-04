<?php

namespace Src\Core\Validation;

class AcceptedRule implements Rule
{
    /**
     * This rule's name, "accepted"
     */
    public static function name(): string
    {
        return 'accepted';
    }

    /**
     * Build the rule; "accepted" takes no parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self;
    }

    /**
     * Whether the value is present and not one of the "not accepted" falsy values
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return $value !== null && $value !== '' && $value !== '0' && $value !== false;
    }

    /**
     * The error message to show when the field wasn't accepted
     */
    public function message(string $field): string
    {
        return 'Please accept the '.str_replace('_', ' ', $field).'.';
    }
}
