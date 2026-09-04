<?php

namespace Src\Core\Database;

class ModelQuery
{
    /**
     * Conditions accumulated by where(), each a [column, value] pair, ANDed together
     *
     * @var list<array{0: string, 1: mixed}>
     */
    private array $wheres;

    /**
     * Hold the model class this query hydrates results into and the table it queries
     *
     * @param  class-string<Model>  $model
     */
    public function __construct(
        private string $model,
        private string $table,
        string $column,
        mixed $value,
    ) {
        $this->wheres = [[$column, $value]];
    }

    /**
     * Add another equality condition, ANDed with any already on this query
     */
    public function where(string $column, mixed $value): self
    {
        $this->wheres[] = [$column, $value];

        return $this;
    }

    /**
     * Run the query and return the first matching row as a model, or null if none match
     */
    public function first(): ?Model
    {
        $conditions = implode(' AND ', array_map(fn (array $where): string => "{$where[0]} = ?", $this->wheres));

        /** @var list<mixed> $bindings */
        $bindings = array_column($this->wheres, 1);

        $row = app(Database::class)->selectOne("SELECT * FROM {$this->table} WHERE {$conditions} LIMIT 1", $bindings);

        return $row ? ($this->model)::hydrate($row) : null;
    }
}
