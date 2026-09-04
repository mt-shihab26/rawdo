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
     * Hold this user's database columns
     */
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $password,
        public bool $terms,
        public string $created_at,
    ) {
        //
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
     * Build a User from a raw database row
     *
     * @param  array<string, mixed>  $row
     */
    private static function fromRow(array $row): self
    {
        return new self(
            id: (int) $row['id'],
            name: (string) $row['name'],
            email: (string) $row['email'],
            password: (string) $row['password'],
            terms: (bool) $row['terms'],
            created_at: (string) $row['created_at'],
        );
    }
}
