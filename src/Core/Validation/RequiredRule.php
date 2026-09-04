<?php

namespace Src\Core\Validation;

class RequiredRule implements Rule
{
    /**
     * This rule's name, "required"
     */
    public static function name(): string
    {
        return 'required';
    }

    /**
     * Build the rule; "required" takes no parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self;
    }

    /**
     * Whether the value is present and not an empty string
     *
     * @param  array<string, mixed>  $data
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return $value !== null && $value !== '';
    }

    /**
     * The error message to show when the field is missing
     */
    public function message(string $field): string
    {
        return 'Please enter your '.str_replace('_', ' ', $field).'.';
    }
}
