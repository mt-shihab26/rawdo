<?php

namespace Src\Core\Http;

use Src\Core\Database\Model;
use Src\Core\Foundation\App;

class Auth
{
    /**
     * Regenerate the session (fixation protection) and remember the given model as the logged-in user
     */
    public static function login(Model $user): void
    {
        /** @var Session $session */
        $session = App::get(Session::class);

        $session->regenerate();
        $session->put('user_id', $user->id);
    }
}
