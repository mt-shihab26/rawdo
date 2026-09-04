<?php

namespace Src\Core\Validation;

use Src\Core\Database;

class ExistsRule implements Rule
{
    /**
     * Hold the table and column to look the value up against
     */
    public function __construct(
        private string $table,
        private string $column,
    ) {
        //
    }

    /**
     * This rule's name, "exists"
     */
    public static function name(): string
    {
        return 'exists';
    }

    /**
     * Build the rule from its "exists:table,column" parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        /** @var string $table */
        /** @var string $column */
        [$table, $column] = explode(',', (string) $parameter, 2);

        return new self($table, $column);
    }

    /**
     * Whether a row exists whose column equals the value
     *
     * @param  array<string, mixed>  $data
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return app(Database::class)->selectOne("SELECT 1 FROM {$this->table} WHERE {$this->column} = ? LIMIT 1", $value) !== null;
    }

    /**
     * The error message to show when no matching row exists
     */
    public function message(string $field): string
    {
        return 'The selected '.str_replace('_', ' ', $field).' is invalid.';
    }
}
