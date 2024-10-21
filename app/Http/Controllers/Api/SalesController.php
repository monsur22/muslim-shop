<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleDetailsResource;
use App\Http\Resources\SaleResource;
use App\Http\Resources\SalesReturnResource;
use App\Models\Sale;
use App\Models\SalesReturn;
use App\Services\Interfaces\SalesServiceInterface;
use App\Services\SalesService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{
    protected $salesService;
    protected $salesReturnService;

    public function __construct(SalesServiceInterface $salesService)
    {
        $this->salesService = $salesService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = $this->salesService->getAllSales();
        return SaleResource::collection($sales);
    }


    public function return(Request $request, $saleId)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.order_item_id' => 'required|integer|exists:order_items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
    
        $sale = Sale::find($saleId);
        if (!$sale) {
            return response()->json(['error' => 'Sales ID not found'], 404);
        }
    
        try {
            $processedSale = $this->salesService->processReturn($sale, $validatedData['items']);
            return new SaleResource($processedSale);
        } catch (\Exception $e) {
            Log::error('Product return controller error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to process return'], 500);
        }
    }
    

    public function salesReturnList()
    {
        $salesReturns = SalesReturn::with('sale')->get();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Sales returns retrieved successfully',
            'api_version' => '1.0',
            'data' => SalesReturnResource::collection($salesReturns),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::with(['order.user', 'order.items.product', 'order.items.store'])->find($id);

        if (!$sale) {
            return response()->json([
                'status' => 'error',
                'code' => 404,
                'message' => 'Sale not found',
                'data' => null,
                'api_version' => '1.0',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Sale details retrieved successfully',
            'api_version' => '1.0',
            'data' => new SaleDetailsResource($sale),
        ], 200);
    
    }
}
