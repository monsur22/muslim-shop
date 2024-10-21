<?php

namespace App\Services\Interfaces;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

interface ProductServiceInterface
{
    public function index($request);

    public function createProduct(StoreProductRequest $request);

    public function updateProduct(StoreProductRequest $request, Product $product);

    public function deleteProduct(Product $product);

    public function updateProductQuantity(StoreProductRequest $request, Product $product);
}
