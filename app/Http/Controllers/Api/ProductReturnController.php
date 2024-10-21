<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductReturnRequest;
use App\Http\Requests\SalesReturnRequest;
use App\Http\Resources\ProductReturnResource;
use App\Models\StockLevel;
use App\Services\ProductReturnService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductReturnController extends Controller
{
    protected $productReturnService;

    public function __construct(ProductReturnService $productReturnService)
    {
        $this->productReturnService = $productReturnService;
    }



    public function returnProduct(SalesReturnRequest $request)
    {
        try {
            $productReturn = $this->productReturnService->returnProduct($request->all());

            return new ProductReturnResource($productReturn);
        } catch (\Exception $e) {
            Log::error('Product return controller error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
