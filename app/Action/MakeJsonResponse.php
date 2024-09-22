<?php

namespace App\Action;

class MakeJsonResponse
{
    public static function make($data, $status = 200)
    {
        return response()->json($data, $status);
    }
}
