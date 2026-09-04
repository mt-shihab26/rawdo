<?php

namespace Src\Core\Validation;

use RuntimeException;

class ValidationException extends RuntimeException
{
    /**
     * Create an exception carrying the errors and old input the caller should flash and redirect back with
     */
    public function __construct(
        public array $errors,
        public array $old = [],
    ) {
        parent::__construct('The given data was invalid.');
    }
}
