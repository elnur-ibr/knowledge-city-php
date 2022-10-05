<?php

namespace App\Core\Exceptions;

use Throwable;

class ValidationException extends BaseException
{
    public array $messages;

    public function __construct(array $messages, $code = 422, Throwable $previous = null)
    {
        parent::__construct('', $code);

        $this->messages = $messages;
    }
}