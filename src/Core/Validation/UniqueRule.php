<?php

namespace Src\Core\Validation;

use Src\Core\Database\Database;
use Src\Core\Foundation\App;

class UniqueRule implements Rule
{
    /**
     * Hold the table and column to check the value against
     */
    public function __construct(
        private string $table,
        private string $column,
    ) {
        //
    }

    /**
     * This rule's name, "unique"
     */
    public static function name(): string
    {
        return 'unique';
    }

    /**
     * Build the rule from its "unique:table,column" parameter
     */
    public static function fromParameter(?string $parameter): self
    {
        /** @var string $table */
        /** @var string $column */
        [$table, $column] = explode(',', (string) $parameter, 2);

        return new self($table, $column);
    }

    /**
     * Whether no row exists whose column already equals the value
     *
     * @param  array<string, mixed>  $data
     */
    public function passes(string $field, mixed $value, array $data): bool
    {
        return App::get(Database::class)->selectOne("SELECT 1 FROM {$this->table} WHERE {$this->column} = ? LIMIT 1", $value) === null;
    }

    /**
     * The error message to show when a matching row already exists
     */
    public function message(string $field): string
    {
        return 'This '.str_replace('_', ' ', $field).' is already taken.';
    }
}
