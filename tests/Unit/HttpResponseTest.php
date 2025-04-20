<?php

namespace Antares\Http\Tests\Unit;

use Antares\Http\HttpResponse;
use Antares\Http\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HttpResponseTest extends TestCase
{
    #[Test]
    public function validate_instance_type()
    {
        $response = HttpResponse::make();
        $this->assertInstanceOf(\Illuminate\Http\Response::class, $response);
    }

    #[Test]
    public function validate_response_content()
    {
        $content = 'Response Content.';
        $status = 222;
        $headers = ['first-header' => 'First Header', 'second-header' => 'Second Header'];

        $response = HttpResponse::make($content, $status, $headers);

        $this->assertEquals($response->content(), $content);
        $this->assertEquals($response->status(), $status);
        $this->assertTrue($response->headers->has('first-header'));
        $this->assertEquals($response->headers->get('first-header'), 'First Header');
        $this->assertTrue($response->headers->has('second-header'));
        $this->assertEquals($response->headers->get('second-header'), 'Second Header');
    }
}
