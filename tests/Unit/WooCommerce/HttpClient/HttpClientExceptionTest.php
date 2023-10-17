<?php

namespace Tests\Unit\WooCommerce\HttpClient;

use Tests\TestCase;
use App\WooCommerce\HttpClient\HttpClientException;
use App\WooCommerce\HttpClient\Request;
use App\WooCommerce\HttpClient\Response;

class HttpClientExceptionTest extends TestCase
{
    protected $exception;

    public function setUp(): void
    {
        parent::setUp();

        $request  = new Request();
        $response = new Response();

        $this->exception = new HttpClientException('Test', 200, $request, $response);
    }

    /** @test */
    public function instance_of_exception(): void
    {
        $this->assertInstanceOf(\Exception::class, $this->exception);
    }

    /** @test */
    public function get_message(): void
    {
        $this->assertEquals('Test', $this->exception->getMessage());
    }

    /** @test */
    public function get_code(): void
    {
        $this->assertEquals(200, $this->exception->getCode());
    }

    /** @test */
    public function get_request(): void
    {
        $this->assertInstanceOf(Request::class, $this->exception->getRequest());
    }

    /** @test */
    public function get_response(): void
    {
        $this->assertInstanceOf(Response::class, $this->exception->getResponse());
    }
}
