<?php

namespace Src\Core\Validation;

class NullableRule implements Rule
{
    /**
     * This rule's name, "nullable"
     */
    public static function name(): string
    {
        return 'nullable';
    }

    /**
     * Build the rule; "nullable" takes no parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        return new self;
    }

    /**
     * Always passes; Validator short-circuits a field's other rules when it's empty and marked nullable, rather than calling this
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return true;
    }

    /**
     * Never shown, since this rule never fails
     */
    public function message(string $field): string
    {
        return '';
    }
}
