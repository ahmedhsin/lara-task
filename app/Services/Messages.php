<?php

namespace App\Services;

class Messages
{
    public static function success($data = [], $msg = '')
    {
        return [
            'message' => $msg,
            'data' => $data
        ];
    }

    public static function error($status = 400, $msg = '')
    {
        return [
            'message' => $msg,
            'status' => $status
        ];
    }
}
