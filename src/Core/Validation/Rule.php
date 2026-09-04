<?php

namespace Src\Core\Validation;

interface Rule
{
    /**
     * The rule's name as used in "field => ['name', 'name:param']" rule strings
     */
    public static function name(): string;

    /**
     * Build the rule from its raw ":"-delimited string parameter (e.g. "8" for "min:8", "users,email" for "exists:users,email")
     */
    public static function fromParameter(?string $parameter): self;

    /**
     * Whether the field's value satisfies this rule, given the full submitted data (for cross-field rules like "confirmed")
     *
     * @param  array<string, mixed>  $data
     */
    public function passes(string $field, mixed $value, array $data): bool;

    /**
     * The error message to show when this rule fails
     */
    public function message(string $field): string;
}
