<?php

namespace Antares\Http\Tests;

use Antares\Http\AbstractHttpErrors;

class HttpErrors extends AbstractHttpErrors
{
    public const GENERIC_ERROR = 999999;

    public const MESSAGES = [
        self::GENERIC_ERROR => 'Generic error'
    ];
}
