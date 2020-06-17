<?php

namespace Antares\Http\Tests\Unit;

use Antares\Http\HttpErrors;
use Antares\Http\Tests\TestCase;

class HttpErrorsTest extends TestCase
{
    /** @test */
    public function validate_error_code()
    {
        $this->assertEquals(999999, HttpErrors::GENERIC_ERROR);
    }

    /** @test */
    public function validate_error_message()
    {
        $this->assertEquals('Generic error.', HttpErrors::message(HttpErrors::GENERIC_ERROR));
    }
}
