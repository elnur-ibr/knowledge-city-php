<?php

namespace App\Services;

class Request extends BaseService
{
    public const GET = 'get';
    public const POST = 'post';
    public const DELETE = 'delete';
    /**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $uri;

    /**
     * @var array
     */
    public $payload;

    public function init(): self
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->uri  = ltrim(trim($_SERVER['REQUEST_URI']),'/');

        switch ($this->method) {
            case static::GET:
                $this->payload = $_GET;
                break;
            case static::POST:
                $this->payload = $_POST;
                break;
        }

        return $this;
    }
}