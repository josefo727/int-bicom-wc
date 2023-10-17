# Documentación de la API de WooCommerce con Servicios

## Tabla de Contenidos

- [Productos](#productos)
- [Categorías](#categorías)
- [Clientes](#clientes)
- [Pedidos](#pedidos)

---

## Productos

Primero, instanciamos el servicio de productos:

```php
use App\Services\WcProductService;

$productService = new WcProductService();
```

### Obtener una lista de productos

```php
$response = $productService->getProducts();
```

### Crear un nuevo producto

```php
$data = [
  'name' => 'Producto de prueba',
  'type' => 'simple',
  'regular_price' => '9.99',
  // ...otros campos
];

$response = $productService->createProduct($data);
```

### Actualizar un producto existente

```php
$data = [
  'name' => 'Nuevo nombre del producto',
  'regular_price' => '12.99',
  // ...otros campos
];

$response = $productService->updateProduct($id, $data);
```

## Categorías

Primero, instanciamos el servicio de categorías:

```php
use App\Services\WcCategoryService;

$categoryService = new WcCategoryService();
```

### Obtener una lista de categorías

```php
$response = $categoryService->getCategories();
```

### Crear una nueva categoría

```php
$data = [
  'name' => 'Electrónicos',
  'slug' => 'electronicos',
  // ...otros campos
];

$response = $categoryService->createCategory($data);
```

### Actualizar una categoría existente

```php
$data = [
  'name' => 'Electrónicos y Gadgets',
  // ...otros campos
];

$response = $categoryService->updateCategory($id, $data);
```

## Clientes

Primero, instanciamos el servicio de clientes:

```php
use App\Services\WcCustomerService;

$customerService = new WcCustomerService();
```

### Obtener una lista de clientes

```php
$response = $customerService->getCustomers();
```

### Crear un nuevo cliente

```php
$data = [
  'email' => 'cliente@example.com',
  'first_name' => 'Juan',
  'last_name' => 'Pérez',
  // ...otros campos
];

$response = $customerService->createCustomer($data);
```

### Actualizar un cliente existente

```php
$data = [
  'first_name' => 'Juan Carlos',
  // ...otros campos
];

$response = $customerService->updateCustomer($id, $data);
```

## Pedidos

Primero, instanciamos el servicio de pedidos:

```php
use App\Services\WcOrderService;

$orderService = new WcOrderService();
```

### Obtener una lista de pedidos

```php
$response = $orderService->getOrders();
```

### Crear un nuevo pedido

```php
$data = [
  'customer_id' => 1,
  'status' => 'processing',
  'line_items' => [
    [
      'product_id' => 1,
      'quantity' => 2
    ]
  ],
  // ...otros campos
];

$response = $orderService->createOrder($data);
```

### Actualizar un pedido existente

```php
$data = [
  'status' => 'completed',
  // ...otros campos
];

$response = $orderService->updateOrder($id, $data);
```
---

