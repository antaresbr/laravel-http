<?php

namespace Antares\Http\Tests\Feature;

use Antares\Http\JsonResponse;
use Antares\Http\Tests\HttpErrors;
use Antares\Http\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ResponseTest extends TestCase
{
    #[Test]
    public function validate_error_json_response()
    {
        $response = JsonResponse::error(HttpErrors::error(HttpErrors::GENERIC_ERROR), null, ['item' => 'Data Item', 'other' => 'Other Item']);
        $rdo = $response->getData();

        $this->assertJson($response->content());
        $this->assertEquals('error', $rdo->status);
        $this->assertEquals(HttpErrors::GENERIC_ERROR, $rdo->code);
        $this->assertEquals(HttpErrors::message(HttpErrors::GENERIC_ERROR), $rdo->message);
        $this->assertNotNull($rdo->data);
        $this->assertEquals('Data Item', $rdo->data->item);
        $this->assertEquals('Other Item', $rdo->data->other);
    }

    #[Test]
    public function validate_successful_json_response()
    {
        $response = JsonResponse::successful(['item' => 'Data Item', 'other' => 'Other Item'], 'Generic successful message.');
        $rdo = $response->getData();

        $this->assertJson($response->content());
        $this->assertEquals('successful', $rdo->status);
        $this->assertEquals('Generic successful message.', $rdo->message);
        $this->assertNotNull($rdo->data);
        $this->assertEquals('Data Item', $rdo->data->item);
        $this->assertEquals('Other Item', $rdo->data->other);
    }
}
