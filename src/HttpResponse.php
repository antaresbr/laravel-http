<?php

namespace Antares\Http;

class HttpResponse
{
    public static function make($content = '', $status = 200, array $headers = [])
    {
        return response($content, $status, $headers);
    }
}
