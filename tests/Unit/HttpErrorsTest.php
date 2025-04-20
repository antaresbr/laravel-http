<?php

namespace Antares\Http\Tests\Unit;

use Antares\Http\Tests\HttpErrors;
use Antares\Http\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HttpErrorsTest extends TestCase
{
    #[Test]
    public function validate_error_code()
    {
        $this->assertEquals(999999, HttpErrors::GENERIC_ERROR);
    }

    #[Test]
    public function validate_error_message()
    {
        $this->assertEquals('Generic error', HttpErrors::message(HttpErrors::GENERIC_ERROR));
    }
}
