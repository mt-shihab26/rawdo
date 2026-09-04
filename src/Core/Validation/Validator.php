<?php

namespace Src\Core\Validation;

use Src\Core\Database;

class Validator
{
    /**
     * Errors collected so far, keyed by field; each field stops at its first failing rule
     */
    private array $errors = [];

    /**
     * Data being validated, trimmed upfront so rules and errors alike see the same sanitized values
     */
    private array $data;

    /**
     * Hold the trimmed data being validated, its rules, and any message overrides
     */
    public function __construct(
        array $data,
        private array $rules,
        private array $messages = [],
    ) {
        $this->data = $this->sanitize($data);
    }

    /**
     * Build a validator for the given data against the given "field => ['rule', 'rule:param']" rules
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
        foreach ($this->rules as $field => $ruleset) {
            $this->validateField($field, is_array($ruleset) ? $ruleset : explode('|', $ruleset));
        }

        if ($this->errors) {
            throw new ValidationException($this->errors, $this->old());
        }

        return $this->validated();
    }

    /**
     * Apply each rule to a field in order, stopping at the first one that fails
     */
    private function validateField(string $field, array $rules): void
    {
        foreach ($rules as $rule) {
            [$name, $parameter] = array_pad(explode(':', $rule, 2), 2, null);

            if (! $this->passes($field, $name, $parameter)) {
                $this->errors[$field] = $this->messages[$field] ?? $this->messages["$field.$name"] ?? $this->defaultMessage($field, $name, $parameter);

                return;
            }
        }
    }

    /**
     * Whether a single named rule (e.g. "min" with parameter "8") passes for the field's current value
     */
    private function passes(string $field, string $rule, ?string $parameter): bool
    {
        $value = $this->data[$field] ?? null;

        return match ($rule) {
            'required' => $value !== null && $value !== '',
            'email' => filter_var($value, FILTER_VALIDATE_EMAIL) !== false,
            'min' => mb_strlen((string) $value) >= (int) $parameter,
            'max' => mb_strlen((string) $value) <= (int) $parameter,
            'confirmed' => $value === ($this->data["{$field}_confirmation"] ?? null),
            'accepted' => $value !== null && $value !== '' && $value !== '0' && $value !== false,
            'exists' => $this->exists($value, $parameter),
            default => true,
        };
    }

    /**
     * Whether a row exists whose column (the "table,column" rule parameter) equals the value
     */
    private function exists(mixed $value, ?string $parameter): bool
    {
        [$table, $column] = explode(',', (string) $parameter, 2);

        return app(Database::class)->selectOne("SELECT 1 FROM {$table} WHERE {$column} = ? LIMIT 1", $value) !== null;
    }

    /**
     * Fall-back "field rule" error message, used when no override is given
     */
    private function defaultMessage(string $field, string $rule, ?string $parameter): string
    {
        $label = str_replace('_', ' ', $field);

        return match ($rule) {
            'required' => "Please enter your {$label}.",
            'email' => 'Please enter a valid email address.',
            'min' => "The {$label} must be at least {$parameter} characters.",
            'max' => "The {$label} must be at most {$parameter} characters.",
            'confirmed' => ucfirst($label).' confirmation does not match.',
            'accepted' => "Please accept the {$label}.",
            'exists' => "The selected {$label} is invalid.",
            default => "The {$label} is invalid.",
        };
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
