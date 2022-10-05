<?php

namespace App\Core\Exceptions;

use Throwable;

class UnAuthorizedException extends BaseException
{

    public function __construct($code = 401, Throwable $previous = null)
    {
        parent::__construct('Unauthorized.', $code);
    }
}