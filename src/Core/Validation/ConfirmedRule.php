<?php

namespace Src\Core\Validation;

class ConfirmedRule implements Rule
{
    /**
     * This rule's name, "confirmed"
     */
    public static function name(): string
    {
        return 'confirmed';
    }

    /**
     * Build the rule; "confirmed" takes no parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self;
    }

    /**
     * Whether the value matches the "{field}_confirmation" field in the submitted data
     *
     * @param  array<string, mixed>  $data
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return $value === ($data["{$field}_confirmation"] ?? null);
    }

    /**
     * The error message to show when the confirmation doesn't match
     */
    public function message(string $field): string
    {
        return ucfirst(str_replace('_', ' ', $field)).' confirmation does not match.';
    }
}
