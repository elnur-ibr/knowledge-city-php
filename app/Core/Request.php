<?php

namespace App\Core;

class Request extends BaseService
{
    /**
     * @var string
     */
    public const GET = 'get';

    /**
     * @var string
     */
    public const POST = 'post';

    /**
     * @var string
     */
    public const DELETE = 'delete';

    /**
     * @var string
     */
    public string $method;

    /**
     * @var string
     */
    public string $uri;

    /**
     * @var array
     */
    public array $payload;

    /**
     * @return $this
     */
    public function init(): self
    {
        $this->method = constant(Request::class . '::' .$_SERVER['REQUEST_METHOD']);

        $this->uri  = ltrim(trim($_SERVER['REQUEST_URI']),'/');

        switch ($this->method) {
            case static::GET:
                $this->payload = $_GET;
                break;
            case static::POST:
                $this->payload = array_merge(
                    $_POST,
                    json_decode(file_get_contents('php://input'), true)
                );
                break;
        }

        return $this;
    }
}