<?php

namespace App\Core;

class Response
{
    public static function setContentJson()
    {
        header("Content-Type: application/json");
    }

    /**
     * @param $data
     * @param int $status
     */
    public static function json($data, $status = 200)
    {
        self::setContentJson();

        http_response_code($status);

        echo json_encode($data);

        return 0;
    }

    /**
     * @param $data
     * @param int $status
     */
    public static function methodNotAllowed($data, $status = 405)
    {
        self::setContentJson();

        http_response_code($status);

        echo json_encode($data);

        return 0;
    }
}