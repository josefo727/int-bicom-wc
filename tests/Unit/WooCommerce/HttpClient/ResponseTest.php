<?php

namespace Tests\Unit\WooCommerce\HttpClient;

use Tests\TestCase;
use App\WooCommerce\HttpClient\Response;

class ResponseTest extends TestCase
{
    protected $response;

    public function setUp(): void
    {
        parent::setUp();
        $this->response = new Response();
    }

    /** @test */
    public function code(): void
    {
        $code = 200;
        $this->response->setCode($code);

        $this->assertEquals($code, $this->response->getCode());
    }

    /** @test */
    public function headers(): void
    {
        $headers = ['Content-Type' => 'application/json'];
        $this->response->setHeaders($headers);

        $this->assertEquals($headers, $this->response->getHeaders());
    }

    /** @test */
    public function body(): void
    {
        $body = '{"product": {"id": 1}}';
        $this->response->setBody($body);

        $this->assertEquals($body, $this->response->getBody());
    }
}
