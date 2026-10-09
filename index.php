<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\ProductService;

try {
    $service = new ProductService();

    $product1 = $service->createProduct('Laptop', 7500000);
    $product2 = $service->createProduct('Mouse', 150000);

    echo $service->displayProduct($product1) . PHP_EOL;
    echo $service->displayProduct($product2) . PHP_EOL;

} catch (Throwable $e) {
    echo "Terjadi Error\n";
    echo "Pesan: " . $e->getMessage() . PHP_EOL;
    echo "File: " . $e->getFile() . PHP_EOL;
    echo "Line: " . $e->getLine() . PHP_EOL;
}