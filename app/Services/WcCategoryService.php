<?php

namespace App\Services;

use App\WooCommerce\Client;
use stdClass;

class WcCategoryService
{
    protected $wcClient;

    public function __construct()
    {
        $this->wcClient = new Client();
    }

    /**
     * Get a list of product categories.
     *
     * @param array $parameters Optional parameters for filtering, etc.
     * @return stdClass
     */
    public function getCategories(array $parameters = []): stdClass
    {
        return $this->wcClient->get('/wp-json/wc/v3/products/categories', $parameters);
    }

    /**
     * Create a new product category.
     *
     * @param array $data Category data.
     * @return stdClass
     */
    public function createCategory(array $data): stdClass
    {
        return $this->wcClient->post('/wp-json/wc/v3/products/categories', $data);
    }

    /**
     * Update an existing product category.
     *
     * @param int $id Category ID.
     * @param array $data Category data.
     * @return stdClass
     */
    public function updateCategory(int $id, array $data): stdClass
    {
        return $this->wcClient->put("/wp-json/wc/v3/products/categories/{$id}", $data);
    }

    /**
     * Delete a product category.
     *
     * @param int $id Category ID.
     * @param array $parameters Optional parameters.
     * @return stdClass
     */
    public function deleteCategory(int $id, array $parameters = []): stdClass
    {
        return $this->wcClient->delete("/wp-json/wc/v3/products/categories/{$id}", $parameters);
    }
}
