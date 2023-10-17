<?php

/**
 * WooCommerce REST API Client
 *
 * @category Client
 */

namespace App\WooCommerce;

use App\WooCommerce\HttpClient\HttpClient;
use Josefo727\GeneralSettings\Models\GeneralSetting;
use stdClass;

/**
 * REST API Client class.
 *
 */
class Client
{
    /**
     * WooCommerce REST API Client version.
     */
    public const VERSION = '3.1.0';

    /**
     * HttpClient instance.
     *
     * @var HttpClient
     */
    public $http;

    /**
     * Initialize client.
     *
     * @param array  $options - Options (version, timeout, verify_ssl, oauth_only).
     */
    public function __construct($options = [])
    {
        $url = GeneralSetting::getValue('URL_STORE');
        $consumerKey = GeneralSetting::getValue('CONSUMER_KEY');
        $consumerSecret = GeneralSetting::getValue('CONSUMER_SECRET');
        $this->http = new HttpClient($url, $consumerKey, $consumerSecret, $options);
    }

    /**
     * POST method.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data     Request data.
     *
     * @return \stdClass
     */
    public function post($endpoint, $data): stdClass
    {
        return $this->http->request($endpoint, 'POST', $data);
    }

    /**
     * PUT method.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data     Request data.
     *
     * @return \stdClass
     */
    public function put($endpoint, $data): stdClass
    {
        return $this->http->request($endpoint, 'PUT', $data);
    }

    /**
     * GET method.
     *
     * @param string $endpoint   API endpoint.
     * @param array  $parameters Request parameters.
     *
     * @return \stdClass
     */
    public function get($endpoint, $parameters = []): stdClass
    {
        return $this->http->request($endpoint, 'GET', [], $parameters);
    }

    /**
     * DELETE method.
     *
     * @param string $endpoint   API endpoint.
     * @param array  $parameters Request parameters.
     *
     * @return \stdClass
     */
    public function delete($endpoint, $parameters = []): stdClass
    {
        return $this->http->request($endpoint, 'DELETE', [], $parameters);
    }

    /**
     * OPTIONS method.
     *
     * @param string $endpoint API endpoint.
     *
     * @return \stdClass
     */
    public function options($endpoint): stdClass
    {
        return $this->http->request($endpoint, 'OPTIONS', [], []);
    }
}
