<?php

namespace Tests\Unit\WooCommerce\HttpClient;

use Database\Seeders\GeneralSettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\WooCommerce\HttpClient\OAuth;
use Josefo727\GeneralSettings\Models\GeneralSetting;

class OAuthTest extends TestCase
{
    use RefreshDatabase;

    protected $oAuth;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => GeneralSettingSeeder::class]);

        $url = GeneralSetting::getValue('URL_STORE');
        $consumerKey = GeneralSetting::getValue('CONSUMER_KEY');
        $consumerSecret = GeneralSetting::getValue('CONSUMER_SECRET');
        $this->oAuth = new OAuth($url, $consumerKey, $consumerSecret, 'v3', 'POST');
    }

    /** @test */
    public function get_parameters()
    {
        $parameters = $this->oAuth->getParameters();
        $keys = [
            'oauth_consumer_key',
            'oauth_nonce',
            'oauth_signature',
            'oauth_signature_method',
            'oauth_timestamp',
        ];

        $this->assertEquals($keys, array_keys($parameters));
        $this->assertEquals(GeneralSetting::getValue('CONSUMER_KEY'), $parameters['oauth_consumer_key']);
        $this->assertEquals('HMAC-SHA256', $parameters['oauth_signature_method']);
    }
}
