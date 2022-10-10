<?php

namespace App\Core;

use App\Core\Exceptions\ValidationException;

class Validation
{
    /**
     * @var array
     */
    public array $messages = [];

    /**
     * @var bool
     */
    public bool $failed = false;

    /**
     * @param string $name
     * @param array $arguments
     * @return self
     */
    public static function check(array $data, array $rules)
    {
        return (new static)->make($data, $rules);
    }

    /**
     * @param array $data
     * @param array $rules
     */
    public function make(array $data, array $gorupedRules): void
    {
        foreach ($gorupedRules as $attribute => $rules) {

            if (in_array('sometimes', $rules)) {
                if (isset($data[$attribute])) {
                    $rules = array_filter($rules, fn($v) => $v != 'sometimes');
                } else {
                    continue;
                }
            }

            foreach ($rules as $rule) {
                if (method_exists($this, $rule)) {
                    $this->{$rule}($attribute, $data[$attribute] ?? null);
                }
            }
        }

        if ($this->failed) {
            throw new ValidationException($this->messages);
        }
    }

    /**
     * @return void
     */
    public function markAsFailed(): void
    {
        $this->failed = true;
    }

    /**
     * Validation rule required
     * @param string $attribute
     * @param $value
     */
    public function required(string $attribute, $value): void
    {
        if (is_null($value)) {
            $this->messages [$attribute] [] = "$attribute field is required.";
            $this->markAsFailed();
        }
    }

    /**
     * Validation tule email
     * @param $attribute
     * @param $value
     */
    public function email($attribute, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->messages[$attribute] [] = "$attribute should be valid email.";
            $this->markAsFailed();
        }
    }

    /**
     * @param $attribute
     * @param $value
     */
    public function bool($attribute, $value): void
    {
        if (!in_array($value, [true, false, 1, 0, "1", "0", "true", "false"], true)) {
            $this->messages[$attribute] [] = "$attribute should be boolean.";
            $this->markAsFailed();
        }
    }

    /**
     * @param $attribute
     * @param $value
     */
    public function unsingnedInteger($attribute, $value): void
    {
        $this->integer($attribute, $value);
        if (!($value > 0)) {
            $this->messages[$attribute] [] = "$attribute should be unsigned integer.";
            $this->markAsFailed();
        }
    }

    /**
     * @param $attribute
     * @param $value
     */
    public function integer($attribute, $value)
    {
        if(!is_integer((int) $value) && ((int) $value) == $value) {
            $this->messages[$attribute] [] = "$attribute should be integer.";
            $this->markAsFailed();
        }
    }
}