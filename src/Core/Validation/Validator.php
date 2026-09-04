<?php

namespace Src\Core\Validation;

use RuntimeException;

class Validator
{
    /**
     * Every rule class available by name (each exposes its own name via Rule::name())
     */
    private const RULES = [
        RequiredRule::class,
        NullableRule::class,
        EmailRule::class,
        MinRule::class,
        MaxRule::class,
        ConfirmedRule::class,
        AcceptedRule::class,
        ExistsRule::class,
    ];

    /**
     * Errors collected so far, keyed by field; each field stops at its first failing rule
     */
    private array $errors = [];

    /**
     * Data being validated, trimmed upfront so rules and errors alike see the same sanitized values
     */
    private array $data;

    /**
     * Hold the trimmed data being validated, its "field => ['rule', 'rule:param', new SomeRule]" rules, and any message overrides
     */
    public function __construct(
        array $data,
        private array $rules,
        private array $messages = [],
    ) {
        $this->data = $this->sanitize($data);
    }

    /**
     * Build a validator for the given data against the given "field => ['rule', 'rule:param', new SomeRule]" rules
     */
    public static function make(array $data, array $rules, array $messages = []): self
    {
        return new self($data, $rules, $messages);
    }

    /**
     * Run every rule and return the sanitized, validated data, or throw with the errors found if any rule fails
     */
    public function validate(): array
    {
        foreach ($this->rules as $field => $rules) {
            $this->validateField($field, $rules);
        }

        if ($this->errors) {
            throw new ValidationException($this->errors, $this->old());
        }

        return $this->validated();
    }

    /**
     * Apply each rule to a field in order, stopping at the first one that fails; skips every other rule when the
     * field is marked "nullable" and its value is empty, rather than running them against nothing
     */
    private function validateField(string $field, array $rules): void
    {
        $resolved = array_map(fn ($rule) => $this->resolveRule($rule), $rules);

        $value = $this->data[$field] ?? null;

        if (($value === null || $value === '') && $this->isNullable($resolved)) {
            return;
        }

        foreach ($resolved as [$name, $instance]) {
            if ($name === NullableRule::name()) {
                continue;
            }

            if (! $instance->passes($field, $value, $this->data)) {
                $this->errors[$field] = $this->messages[$field] ?? $this->messages["$field.$name"] ?? $instance->message($field);

                return;
            }
        }
    }

    /**
     * Whether the field's resolved rules include "nullable"
     */
    private function isNullable(array $resolved): bool
    {
        foreach ($resolved as [$name, $_]) {
            if ($name === NullableRule::name()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Turn a "name:param" rule string, or an already-built Rule instance, into its [name, Rule instance] pair
     */
    private function resolveRule(string|Rule $rule): array
    {
        if ($rule instanceof Rule) {
            return [$rule::name(), $rule];
        }

        [$name, $parameter] = array_pad(explode(':', $rule, 2), 2, null);

        $class = $this->ruleClass($name);

        return [$name, $class::fromParameter($parameter)];
    }

    /**
     * Find the registered rule class whose name matches, or fail loudly for an unknown rule
     */
    private function ruleClass(string $name): string
    {
        foreach (self::RULES as $class) {
            if ($class::name() === $name) {
                return $class;
            }
        }

        throw new RuntimeException("Unknown validation rule [{$name}].");
    }

    /**
     * The (already-trimmed) values for just the fields that have rules
     */
    private function validated(): array
    {
        return array_intersect_key($this->data, $this->rules);
    }

    /**
     * The (already-trimmed) submitted data to flash as old input, excluding the CSRF token and any password field
     */
    private function old(): array
    {
        return array_filter(
            $this->data,
            fn ($field) => $field !== '_token' && ! str_contains(strtolower($field), 'password'),
            ARRAY_FILTER_USE_KEY,
        );
    }

    /**
     * Trim every string value; HTML escaping is the view layer's job (see the {{ }} compiler), not the validator's
     */
    private function sanitize(array $data): array
    {
        return array_map(fn ($value) => is_string($value) ? trim($value) : $value, $data);
    }
}
