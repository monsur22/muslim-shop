<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
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
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $product = $this->productService->createProduct($request);
        return new ProductResource($product);


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Request $request)
    {
        // return new ProductResource($product->load('images', 'category', 'supplier', 'brand', 'store', 'user','description));
        $includes = $request->query('include') ? explode(',', $request->query('include')) : [];
        $product->load($includes);
    
        return new ProductResource($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product = $this->productService->updateProduct($request, $product);
        return new ProductResource($product);
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
