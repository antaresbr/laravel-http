<?php

namespace Antares\Http;

class JsonResponse
{
    public const ERROR = 'error';
    public const SUCCESSFUL = 'successful';

    public static function make($status = null, $code = null, $message = null, $data = null)
    {
        $r = ['status' => $status];
        if (trim($code) != '') {
            $r['code'] = $code;
        }
        $r['message'] = $message;
        $r['data'] = $data;

        return response()->json($r);
    }

    public static function error($code, $message = null, $data = null)
    {
        $message = !is_null($message) ? __($message) : HttpErrors::message($code);

        return static::make(static::ERROR, $code, $message, $data);
    }

    public static function successful($data, $message = null)
    {
        return static::make(static::SUCCESSFUL, null, $message, $data);
    }
}
