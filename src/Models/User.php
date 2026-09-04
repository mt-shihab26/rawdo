<?php

namespace Src\Models;

use Src\Core\Database;

class User
{
    /**
     * Find a user by email, or null if none exists
     */
    public static function findByEmail(string $email): ?array
    {
        return app(Database::class)->selectOne('SELECT * FROM users WHERE email = ? LIMIT 1', $email);
    }

    /**
     * Whether a user with the given email already exists
     */
    public static function emailExists(string $email): bool
    {
        return self::findByEmail($email) !== null;
    }

    /**
     * Insert a new user (expects an already-hashed password) and return its id
     */
    public static function create(array $data): int
    {
        return app(Database::class)->insert(
            'INSERT INTO users (name, email, password) VALUES (?, ?, ?)',
            $data['name'], $data['email'], $data['password']
        );
    }
}
