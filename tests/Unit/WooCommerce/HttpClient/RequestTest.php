<?php

namespace Tests\Unit\WooCommerce\HttpClient;

use Tests\TestCase;
use App\WooCommerce\HttpClient\Request;

class RequestTest extends TestCase
{
    protected $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = new Request();
    }

    /** @test */
    public function url(): void
    {
        $url = 'http://example.com';
        $this->request->setUrl($url);

        $this->assertEquals($url, $this->request->getUrl());
    }

    /** @test */
    public function method(): void
    {
        $method = 'PUT';
        $this->request->setMethod($method);

        $this->assertEquals($method, $this->request->getMethod());
    }

    /** @test */
    public function parameters(): void
    {
        $parameters = ['page' => 2];
        $this->request->setParameters($parameters);

        $this->assertEquals($parameters, $this->request->getParameters());
    }

    /** @test */
    public function headers(): void
    {
        $headers = ['Content-Type' => 'application/json'];
        $this->request->setHeaders($headers);

        $this->assertEquals($headers, $this->request->getHeaders());
    }

    /** @test */
    public function raw_headers(): void
    {
        $headers = ['Content-Type' => 'application/json'];
        $this->request->setHeaders($headers);
        $rawHeaders = ['Content-Type: application/json'];

        $this->assertEquals($rawHeaders, $this->request->getRawHeaders());
    }

    /** @test */
    public function body(): void
    {
        $body = '{"product": {"id": 1}}';
        $this->request->setBody($body);

        $this->assertEquals($body, $this->request->getBody());
    }
}
