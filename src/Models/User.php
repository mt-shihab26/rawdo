<?php

namespace Src\Models;

use RuntimeException;
use Src\Core\Database;

class User
{
    /**
     * Hold this user's database columns
     */
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $password,
        public string $created_at,
    ) {
        //
    }

    /**
     * Fields that need transforming before they're written to the database, keyed by field name
     *
     * @return array<string, string>
     */
    private static function casts(): array
    {
        return [
            'password' => 'hash',
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
     * Insert a new user and return it, applying casts() to the given data first
     *
     * @param  array{name: string, email: string, password: string}  $data
     */
    public static function create(array $data): self
    {
        $data = self::applyCasts($data);

        $id = app(Database::class)->insert(
            'INSERT INTO users (name, email, password) VALUES (?, ?, ?)',
            $data['name'], $data['email'], $data['password']
        );

        return self::find($id);
    }

    /**
     * Apply each of casts()'s transforms to the given data
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private static function applyCasts(array $data): array
    {
        foreach (self::casts() as $field => $cast) {
            if (isset($data[$field]) && $cast === 'hash') {
                $data[$field] = password_hash($data[$field], PASSWORD_DEFAULT);
            }
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
            created_at: (string) $row['created_at'],
        );
    }
}
