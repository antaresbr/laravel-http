<?php

namespace Antares\Http;

abstract class AbstractHttpErrors
{
    //------------------------------------------------------------
    //
    // Descendent classes must declare the error constants and an
    // associative array constant called MESSAGES with the errors
    // messages, like bellow:
    //
    //   public const GENERIC_ERROR = 999901;
    //   public const ANOTHER_ERROR = 999902;
    //
    //   public const MESSAGES = [
    //      self::GENERIC_ERROR => 'A Generic error message',
    //      self::ANOTHER_ERROR => 'Another error messsage',
    //   ];
    //
    //------------------------------------------------------------

    public static function message($code, $default = null)
    {
        return array_key_exists($code, static::MESSAGES) ? static::MESSAGES[$code] : $default;
    }

    public static function error($code)
    {
        return [
            'code' => $code,
            'message' => static::message($code)
        ];
    }
}
