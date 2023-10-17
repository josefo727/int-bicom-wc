<?php

namespace App\Services;

use App\WooCommerce\Client;
use stdClass;

class WcProductService
{
    protected $wcClient;

    public function __construct()
    {
        $this->wcClient = new Client();
    }

    /**
     * Get a list of products.
     *
     * @param array $parameters Optional parameters for filtering, etc.
     * @return stdClass
     */
    public function getProducts(array $parameters = []): stdClass
    {
        return $this->wcClient->get('/wp-json/wc/v3/products', $parameters);
    }

    /**
     * Create a new product.
     *
     * @param array $data Product data.
     * @return stdClass
     */
    public function createProduct(array $data): stdClass
    {
        return $this->wcClient->post('/wp-json/wc/v3/products', $data);
    }

    /**
     * Update an existing product.
     *
     * @param int $id Product ID.
     * @param array $data Product data.
     * @return stdClass
     */
    public function updateProduct(int $id, array $data): stdClass
    {
        return $this->wcClient->put("/wp-json/wc/v3/products/{$id}", $data);
    }

    /**
     * Delete a product.
     *
     * @param int $id Product ID.
     * @param array $parameters Optional parameters.
     * @return stdClass
     */
    public function deleteProduct(int $id, array $parameters = []): stdClass
    {
        return $this->wcClient->delete("/wp-json/wc/v3/products/{$id}", $parameters);
    }
}
