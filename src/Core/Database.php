<?php

namespace Src\Core;

use PDO;
use PDOStatement;

class Database extends PDO
{
    /**
     * Connect to the app's SQLite database file
     */
    public function __construct()
    {
        parent::__construct('sqlite:'.Paths::storage('database.sqlite'));

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Run a SELECT query and return every matching row
     */
    public function select(string $query, mixed ...$bindings): array
    {
        return $this->run($query, $bindings)->fetchAll();
    }

    /**
     * Run a SELECT query and return the first matching row, or null if none
     */
    public function selectOne(string $query, mixed ...$bindings): ?array
    {
        $row = $this->run($query, $bindings)->fetch();

        return $row ?: null;
    }

    /**
     * Run an INSERT query and return the new row's id
     */
    public function insert(string $query, mixed ...$bindings): int
    {
        $this->run($query, $bindings);

        return (int) $this->lastInsertId();
    }

    /**
     * Run an UPDATE query and return the number of affected rows
     */
    public function update(string $query, mixed ...$bindings): int
    {
        return $this->run($query, $bindings)->rowCount();
    }

    /**
     * Run a DELETE query and return the number of affected rows
     */
    public function delete(string $query, mixed ...$bindings): int
    {
        return $this->run($query, $bindings)->rowCount();
    }

    /**
     * Prepare and execute a query with its bindings, returning the executed statement
     */
    private function run(string $query, array $bindings): PDOStatement
    {
        $statement = $this->prepare($query);
        $statement->execute($this->flattenBindings($bindings));

        return $statement;
    }

    /**
     * Unwrap bindings passed as a single array (e.g. update($query, [$name, $id])) instead of variadic scalars
     */
    private function flattenBindings(array $bindings): array
    {
        return count($bindings) === 1 && is_array($bindings[0]) ? $bindings[0] : $bindings;
    }
}
