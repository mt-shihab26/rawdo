<?php

namespace Src\Models;

use Src\Core\Database;

class User
{
    /**
     * Create the model with the database connection it queries
     */
    public function __construct(
        private Database $db,
    ) {
        //
    }

    /**
     * Find a user by email, or null if none exists
     */
    public function findByEmail(string $email): ?array
    {
        $statement = $this->db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $statement->execute([$email]);

        $user = $statement->fetch();

        return $user ?: null;
    }

    /**
     * Whether a user with the given email already exists
     */
    public function emailExists(string $email): bool
    {
        return $this->findByEmail($email) !== null;
    }

    /**
     * Insert a new user (expects an already-hashed password) and return its id
     */
    public function create(array $data): int
    {
        $statement = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $statement->execute([$data['name'], $data['email'], $data['password']]);

        return (int) $this->db->lastInsertId();
    }
}
