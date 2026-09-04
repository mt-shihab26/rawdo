<?php

namespace Src\Models;

use ReflectionClass;
use RuntimeException;
use Src\Core\Database;

class User
{
    /**
     * Fields that create() is allowed to fill from the given data
     *
     * @return list<string>
     */
    public function fillable(): array
    {
        return [
            'name',
            'email',
            'password',
            'terms',
        ];
    }

    /**
     * Fields that need transforming before they're written to the database, keyed by field name
     *
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'password' => 'hash',
            'terms' => 'bool',
        ];
    }

    /**
     * Find a user by email, or null if none exists
     */
    public static function findByEmail(string $email): ?self
    {
        $row = app(Database::class)->selectOne('SELECT * FROM users WHERE email = ? LIMIT 1', $email);

        return $row ? self::fromRow($row) : null;
    }

    /**
     * Insert a new user and return it, keeping only fillable() fields from the given data and applying casts() to them
     *
     * @param  array<string, mixed>  $data
     */
    public static function create(array $data): self
    {
        $blank = (new ReflectionClass(self::class))->newInstanceWithoutConstructor();

        $data = self::filterFillable($data, $blank->fillable());
        $data = self::applyCasts($data, $blank->casts());

        $id = app(Database::class)->insert(
            'INSERT INTO users (name, email, password, terms) VALUES (?, ?, ?, ?)',
            $data['name'], $data['email'], $data['password'], $data['terms']
        );

        return self::find($id);
    }

    /**
     * This user's database columns, keyed by field name; accessed via __get()/__set() as $user->name etc.
     *
     * @var array<string, mixed>
     */
    private array $attributes = [];

    /**
     * Read a column, e.g. $user->name
     */
    public function __get(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * Write a column, e.g. $user->name = 'Jane'
     */
    public function __set(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
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
     * Find a user by id, throwing if none exists
     */
    private static function find(int $id): self
    {
        $row = app(Database::class)->selectOne('SELECT * FROM users WHERE id = ? LIMIT 1', $id);

        if ($row === null) {
            throw new RuntimeException("User [{$id}] not found.");
        }

        return self::fromRow($row);
    }

    /**
     * Build a User from a raw database row, assigning each column via __set() with no per-field property
     * declarations or constructor, then re-applying casts() so e.g. a stored 0/1 comes back as a real bool
     *
     * @param  array<string, mixed>  $row
     */
    private static function fromRow(array $row): self
    {
        $user = (new ReflectionClass(self::class))->newInstanceWithoutConstructor();

        foreach ($row as $field => $value) {
            $user->$field = $value;
        }

        foreach ($user->casts() as $field => $cast) {
            if ($cast === 'bool') {
                $user->$field = (bool) $user->$field;
            }
        }

        return $user;
    }
}
