<?php

namespace Antares\Http\Tests\Unit;

use Antares\Http\JsonResponse;
use Antares\Http\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class JsonResponseTest extends TestCase
{
    private function getBaseResponse($status, $code = null)
    {
        $r = ['status' => $status];
        if ($code !== null) {
            $r['code'] = $code;
        }
        return $r + [
            'message' => 'Response message.',
            'data' => [
                'user' => [
                    'login' => 'admin',
                    'name' => 'Admin User',
                    'email' => 'admin@admin.org'
                ]
            ]
        ];
    }

    #[Test]
    public function validate_instance_type()
    {
        $response = JsonResponse::make();
        $this->assertInstanceOf(\Illuminate\Http\JsonResponse::class, $response);
    }

    #[Test]
    public function validate_error_response()
    {
        $baseResponse = $this->getBaseResponse(JsonResponse::ERROR, 222);

        $response = JsonResponse::error($baseResponse['code'], $baseResponse['message'], $baseResponse['data']);
        $this->assertEquals(json_encode($baseResponse), $response->content());
    }

    #[Test]
    public function validate_successful_response()
    {
        $baseResponse = $this->getBaseResponse(JsonResponse::SUCCESSFUL);

        $response = JsonResponse::successful($baseResponse['data'], $baseResponse['message']);
        $this->assertEquals(json_encode($baseResponse), $response->content());
    }
}
