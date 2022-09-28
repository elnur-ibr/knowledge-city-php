<?php

namespace App\Core;

class Validation
{
    /**
     * @var array
     */
    public array $messages = [];

    /**
     * @var bool
     */
    public bool $failed = true;

    /**
     * @param string $name
     * @param array $arguments
     * @return self
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return (new static)->$name(...$arguments);
    }

    /**
     * @param array $data
     * @param array $rules
     */
    public function make(array $data, array $rules): void
    {
        foreach ($data as $key => $value) {
            if (isset($rules[$key])) {
                foreach ($rules[$key] as $rule) {
                    if (method_exists($this, $rule)) {
                        $this->{$rule}($key, $value);
                    }
                }
            }
        }


    }

    /**
     *
     */
    public function required(string $key, $value): void
    {
        if(is_null($value)) {
            $this->messages []= "$key field is required.";
        }
    }

    /**
     * @return void
     */
    public function markAsFailed(): void
    {
        $this->failed = true;
    }
}