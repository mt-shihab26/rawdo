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
     * Find a user by email, or null if none exists
     */
    public static function findByEmail(string $email): ?self
    {
        $row = app(Database::class)->selectOne('SELECT * FROM users WHERE email = ? LIMIT 1', $email);

        return $row ? self::fromRow($row) : null;
    }

    /**
     * Insert a new user (expects an already-hashed password) and return it
     *
     * @param  array{name: string, email: string, password: string}  $data
     */
    public static function create(array $data): self
    {
        $id = app(Database::class)->insert(
            'INSERT INTO users (name, email, password) VALUES (?, ?, ?)',
            $data['name'], $data['email'], $data['password']
        );

        return self::find($id);
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
