<?php

namespace Src\Core\Validation;

class Validator
{
    /**
     * Errors collected so far, keyed by field; each field stops at its first failing rule
     */
    private array $errors = [];

    /**
     * Hold the data being validated, its rules, and any message overrides
     */
    public function __construct(
        private array $data,
        private array $rules,
        private array $messages = [],
    ) {
        //
    }

    /**
     * Build a validator for the given data against the given "field => ['rule', 'rule:param']" rules
     */
    public static function make(array $data, array $rules, array $messages = []): self
    {
        return new self($data, $rules, $messages);
    }

    /**
     * Run every rule and return the errors found, keyed by field; empty when validation passes
     */
    public function validate(): array
    {
        foreach ($this->rules as $field => $ruleset) {
            $this->validateField($field, is_array($ruleset) ? $ruleset : explode('|', $ruleset));
        }

        return $this->errors;
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
            default => true,
        };
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
            default => "The {$label} is invalid.",
        };
    }
}
