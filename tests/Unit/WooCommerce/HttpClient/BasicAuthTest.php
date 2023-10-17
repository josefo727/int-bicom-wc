<?php

namespace Tests\Unit\WooCommerce\HttpClient;

use App\WooCommerce\HttpClient\BasicAuth;
use Database\Seeders\GeneralSettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Josefo727\GeneralSettings\Models\GeneralSetting;
use Tests\TestCase;

class BasicAuthTest extends TestCase
{
    use RefreshDatabase;

    protected $basicAuth;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => GeneralSettingSeeder::class]);

        $this->basicAuth = new BasicAuth(null, GeneralSetting::getValue('CONSUMER_KEY'), GeneralSetting::getValue('CONSUMER_SECRET'), true);
    }

    /** @test */
    public function get_parameters(): void
    {
        $default = [
            'consumer_key'    => GeneralSetting::getValue('CONSUMER_KEY'),
            'consumer_secret' => GeneralSetting::getValue('CONSUMER_SECRET'),
        ];

        $this->assertEquals($default, $this->basicAuth->getParameters());
    }
}

