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
        $r['message'] = __($message);
        $r['data'] = $data;

        return response()->json($r);
    }

    public static function error($code, $message = null, $data = null)
    {
        if (is_array($code)) {
            $error_code = array_key_exists('code', $code) ? $code['code'] : null;
            $error_message = array_key_exists('message', $code) ? $code['message'] : null;
        } else {
            $error_code = $code;
            $error_message = null;
        }

        if (!is_null($message)) {
            $error_message = $message;
        }

        return static::make(static::ERROR, $error_code, $error_message, $data);
    }

    public static function successful($data, $message = null)
    {
        return static::make(static::SUCCESSFUL, null, $message, $data);
    }
}
