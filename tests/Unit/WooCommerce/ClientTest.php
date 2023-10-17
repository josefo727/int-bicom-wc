<?php

namespace Tests\Unit\WooCommerce;

use Database\Seeders\GeneralSettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\WooCommerce\Client;
use App\WooCommerce\HttpClient\HttpClient;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => GeneralSettingSeeder::class]);
    }

    /** @test */
    public function http_instance_of_http_client(): void
    {
        $client = new Client();

        $this->assertInstanceOf(HttpClient::class, $client->http);
    }
}
