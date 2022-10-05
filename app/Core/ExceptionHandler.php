<?php

namespace App\Core;

use App\Core\Exceptions\BaseException;
use App\Core\Exceptions\ValidationException;
use Throwable;

class ExceptionHandler
{
    public static function handle(callable $callback)
    {
        try {
            $callback();
        } catch (ValidationException $e) {
            Response::json(['messages' => $e->messages], $e->getCode());
        } catch (BaseException $e) {
            Response::json(['messages' => $e->getMessage()], $e->getCode());
        } catch (Throwable $e) {
            throw $e;
        }
    }
}