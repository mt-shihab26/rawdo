<?php

namespace Src\Core\Validation;

use RuntimeException;

class Validator
{
    /**
     * Every rule class available by name (each exposes its own name via Rule::name())
     *
     * @var list<class-string<Rule>>
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
     *
     * @var array<string, string>
     */
    private array $errors = [];

    /**
     * Data being validated, trimmed upfront so rules and errors alike see the same sanitized values
     *
     * @var array<string, mixed>
     */
    private array $data;

    /**
     * Hold the trimmed data being validated, its "field => ['rule', 'rule:param', new SomeRule]" rules, and any message overrides
     *
     * @param  array<string, mixed>  $data
     * @param  array<string, array<int, string|Rule>>  $rules
     * @param  array<string, string>  $messages
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
     *
     * @param  array<string, mixed>  $data
     * @param  array<string, array<int, string|Rule>>  $rules
     * @param  array<string, string>  $messages
     */
    public static function make(array $data, array $rules, array $messages = []): self
    {
        return new self($data, $rules, $messages);
    }

    /**
     * Run every rule and return the sanitized, validated data, or throw with the errors found if any rule fails
     *
     * @return array<string, mixed>
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
     *
     * @param  array<int, string|Rule>  $rules
     */
    private function validateField(string $field, array $rules): void
    {
        /** @var list<array{0: string, 1: Rule}> $resolved */
        $resolved = array_map(fn (string|Rule $rule): array => $this->resolveRule($rule), $rules);

        /** @var mixed $value */
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
     *
     * @param  list<array{0: string, 1: Rule}>  $resolved
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
     *
     * @return array{0: string, 1: Rule}
     */
    private function resolveRule(string|Rule $rule): array
    {
        if ($rule instanceof Rule) {
            return [$rule::name(), $rule];
        }

        /** @var string $name */
        /** @var ?string $parameter */
        [$name, $parameter] = array_pad(explode(':', $rule, 2), 2, null);

        $class = $this->ruleClass($name);

        return [$name, $class::fromParameter($parameter)];
    }

    /**
     * Find the registered rule class whose name matches, or fail loudly for an unknown rule
     *
     * @return class-string<Rule>
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
     *
     * @return array<string, mixed>
     */
    private function validated(): array
    {
        return array_intersect_key($this->data, $this->rules);
    }

    /**
     * The (already-trimmed) submitted data to flash as old input, excluding the CSRF token and any password field
     *
     * @return array<string, mixed>
     */
    private function old(): array
    {
        return array_filter(
            $this->data,
            fn (string $field): bool => $field !== '_token' && ! str_contains(strtolower($field), 'password'),
            ARRAY_FILTER_USE_KEY,
        );
    }

    /**
     * Trim every string value; HTML escaping is the view layer's job (see the {{ }} compiler), not the validator's
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function sanitize(array $data): array
    {
        return array_map(fn (mixed $value): mixed => is_string($value) ? trim($value) : $value, $data);
    }
}
