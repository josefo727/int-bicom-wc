<?php

namespace App\Services;

use App\WooCommerce\Client;
use stdClass;

class WcCustomerService
{
    protected $wcClient;

    public function __construct()
    {
        $this->wcClient = new Client();
    }

    /**
     * Get a list of customers.
     *
     * @param array $parameters Optional parameters for filtering, etc.
     * @return stdClass
     */
    public function getCustomers(array $parameters = []): stdClass
    {
        return $this->wcClient->get('/wp-json/wc/v3/customers', $parameters);
    }

    /**
     * Create a new customer.
     *
     * @param array $data Customer data.
     * @return stdClass
     */
    public function createCustomer(array $data): stdClass
    {
        return $this->wcClient->post('/wp-json/wc/v3/customers', $data);
    }

    /**
     * Update an existing customer.
     *
     * @param int $id Customer ID.
     * @param array $data Customer data.
     * @return stdClass
     */
    public function updateCustomer(int $id, array $data): stdClass
    {
        return $this->wcClient->put("/wp-json/wc/v3/customers/{$id}", $data);
    }

    /**
     * Delete a customer.
     *
     * @param int $id Customer ID.
     * @param array $parameters Optional parameters.
     * @return stdClass
     */
    public function deleteCustomer(int $id, array $parameters = []): stdClass
    {
        return $this->wcClient->delete("/wp-json/wc/v3/customers/{$id}", $parameters);
    }
}
