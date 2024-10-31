<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\StoreProductResource;
use App\Http\Resources\StoreResource;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->productService->index($request);
        return StoreProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->createProduct($request);
        dd($product);
        return new StoreProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(StoreProduct $product, Request $request)
    {
        return new StoreProductResource($product->load('product', 'product.images', 'product.category', 'product.supplier', 'product.brand', 'product.user', 'product.description'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, StoreProduct $product)
    {
        $product = $this->productService->updateProduct($request, $product);
        return new StoreProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
