<?php

namespace Src\Core;

use ReflectionClass;
use RuntimeException;

abstract class Model
{
    /**
     * This model's database columns, keyed by field name; accessed via __get()/__set() as $model->name etc.
     *
     * @var array<string, mixed>
     */
    private array $attributes = [];

    /**
     * The table this model persists to
     */
    abstract protected function table(): string;

    /**
     * Fields that create() is allowed to fill from the given data
     *
     * @return list<string>
     */
    protected function fillable(): array
    {
        return [];
    }

    /**
     * Fields that need transforming before they're written to the database, keyed by field name
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * Read a column, e.g. $model->name
     */
    public function __get(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * Write a column, e.g. $model->name = 'Jane'
     */
    public function __set(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
    }

    /**
     * Find a row by id, or null if none exists
     */
    public static function find(int $id): ?static
    {
        $blank = (new ReflectionClass(static::class))->newInstanceWithoutConstructor();

        $row = app(Database::class)->selectOne('SELECT * FROM '.$blank->table().' WHERE id = ? LIMIT 1', $id);

        return $row ? static::fromRow($row) : null;
    }

    /**
     * Insert a new row and return it, keeping only fillable() fields from the given data and applying casts() to them
     *
     * @param  array<string, mixed>  $data
     */
    public static function create(array $data): static
    {
        $blank = (new ReflectionClass(static::class))->newInstanceWithoutConstructor();

        $data = self::filterFillable($data, $blank->fillable());
        $data = self::applyCasts($data, $blank->casts());

        $columns = array_keys($data);
        $placeholders = implode(', ', array_fill(0, count($columns), '?'));

        $id = app(Database::class)->insert(
            'INSERT INTO '.$blank->table().' ('.implode(', ', $columns).") VALUES ({$placeholders})",
            ...array_values($data)
        );

        return static::find($id) ?? throw new RuntimeException(static::class." [{$id}] not found after insert.");
    }

    /**
     * Keep only the given data's fillable() fields, dropping everything else
     *
     * @param  array<string, mixed>  $data
     * @param  list<string>  $fillable
     * @return array<string, mixed>
     */
    private static function filterFillable(array $data, array $fillable): array
    {
        return array_intersect_key($data, array_flip($fillable));
    }

    /**
     * Apply each of casts()'s transforms to the given data
     *
     * @param  array<string, mixed>  $data
     * @param  array<string, string>  $casts
     * @return array<string, mixed>
     */
    private static function applyCasts(array $data, array $casts): array
    {
        foreach ($casts as $field => $cast) {
            if (! isset($data[$field])) {
                continue;
            }

            $data[$field] = match ($cast) {
                'hash' => password_hash($data[$field], PASSWORD_DEFAULT),
                'bool' => $data[$field] ? 1 : 0,
                default => $data[$field],
            };
        }

        return $data;
    }

    /**
     * Build a model from a raw database row, assigning each column via __set() with no per-field property
     * declarations or constructor, then re-applying casts() so e.g. a stored 0/1 comes back as a real bool
     *
     * @param  array<string, mixed>  $row
     */
    protected static function fromRow(array $row): static
    {
        $model = (new ReflectionClass(static::class))->newInstanceWithoutConstructor();

        foreach ($row as $field => $value) {
            $model->$field = $value;
        }

        foreach ($model->casts() as $field => $cast) {
            if ($cast === 'bool') {
                $model->$field = (bool) $model->$field;
            }
        }

        return $model;
    }
}
