<?php

namespace Src\Models;

use Src\Core\Database\Model;

class User extends Model
{
    /**
     * The table this model persists to
     */
    protected function table(): string
    {
        return 'users';
    }

    /**
     * Fields that create() is allowed to fill from the given data
     *
     * @return list<string>
     */
    protected function fillable(): array
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
    protected function casts(): array
    {
        return [
            'password' => 'hash',
            'terms' => 'bool',
        ];
    }
}
