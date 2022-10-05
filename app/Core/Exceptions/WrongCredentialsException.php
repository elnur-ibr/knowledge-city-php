<?php

namespace App\Core\Exceptions;

use Throwable;

class WrongCredentialsException extends BaseException
{

    public function __construct($code = 401, Throwable $previous = null)
    {
        parent::__construct('Wrong email or password.', $code);
    }
}