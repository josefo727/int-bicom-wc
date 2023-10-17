<?php

namespace App\Services;

use App\WooCommerce\Client;
use stdClass;

class WcOrderService
{
    protected $wcClient;

    public function __construct()
    {
        $this->wcClient = new Client();
    }

    /**
     * Get a list of orders.
     *
     * @param array $parameters Optional parameters for filtering, etc.
     * @return stdClass
     */
    public function getOrders(array $parameters = []): stdClass
    {
        return $this->wcClient->get('/wp-json/wc/v3/orders', $parameters);
    }

    /**
     * Create a new order.
     *
     * @param array $data Order data.
     * @return stdClass
     */
    public function createOrder(array $data): stdClass
    {
        return $this->wcClient->post('/wp-json/wc/v3/orders', $data);
    }

    /**
     * Update an existing order.
     *
     * @param int $id Order ID.
     * @param array $data Order data.
     * @return stdClass
     */
    public function updateOrder(int $id, array $data): stdClass
    {
        return $this->wcClient->put("/wp-json/wc/v3/orders/{$id}", $data);
    }

    /**
     * Delete an order.
     *
     * @param int $id Order ID.
     * @param array $parameters Optional parameters.
     * @return stdClass
     */
    public function deleteOrder(int $id, array $parameters = []): stdClass
    {
        return $this->wcClient->delete("/wp-json/wc/v3/orders/{$id}", $parameters);
    }
}
