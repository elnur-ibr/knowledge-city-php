<?php

namespace App\Core;

class Hash
{
    public static function check($value, $hashedValue)
    {
        return password_verify($value, $hashedValue);
    }
}