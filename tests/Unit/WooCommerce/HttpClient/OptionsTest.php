<?php

namespace Tests\Unit\WooCommerce\HttpClient;

use Tests\TestCase;
use App\WooCommerce\HttpClient\Options;

class OptionsTest extends TestCase
{
    protected $options;

    public function setUp(): void
    {
        parent::setUp();
        $this->options = new Options([]);
    }

    /** @test */
    public function default_value_of_get_version(): void
    {
        $this->assertEquals('wc/v3', $this->options->getVersion());
    }

    /** @test */
    public function default_value_of_verify_ssl(): void
    {
        $this->assertTrue($this->options->verifySsl());
    }

    /** @test */
    public function default_value_of_is_oauth_only(): void
    {
        $this->assertFalse($this->options->isOAuthOnly());
    }

    /** @test */
    public function default_value_of_get_timeout(): void
    {
        $this->assertEquals(15, $this->options->getTimeout());
    }

    /** @test */
    public function default_value_of_is_query_string_auth(): void
    {
        $this->assertFalse($this->options->isQueryStringAuth());
    }

    /** @test */
    public function is_wpapi(): void
    {
        $this->assertTrue($this->options->isWPAPI());
    }

    /** @test */
    public function default_value_of_api_prefix(): void
    {
        $this->assertEquals('/wp-json/', $this->options->apiPrefix());
    }

    /** @test */
    public function default_value_of_user_agent(): void
    {
        $this->assertEquals('WooCommerce API Client-PHP', $this->options->userAgent());
    }

    /** @test */
    public function default_value_of_get_follow_redirects(): void
    {
        $this->assertFalse($this->options->getFollowRedirects());
    }

    /** @test */
    public function default_value_of_is_method_override_query(): void
    {
        $this->assertFalse($this->options->isMethodOverrideQuery());
    }

    /** @test */
    public function default_value_of_is_method_override_header(): void
    {
        $this->assertFalse($this->options->isMethodOverrideHeader());
    }
}
