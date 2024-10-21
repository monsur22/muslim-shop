<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderDetailsResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(StoreOrderRequest $request)
    {
        $type = $request->type;
        // $user = Auth::user();
        if ($type === 'ecommerce') {
            $user = Auth::user();
            $shippingAddress = $request->shipping_address;
        } else {
            $user = User::findOrFail($request->user_id); // Ensure you import the User model
        }
        $items = $request->items;
        $paymentMethodId = $request->payment_method_id;
        $paymentMethod = $request->payment_method;
        $order = $this->orderService->createOrder($user, $items, $paymentMethodId,$paymentMethod,$request,$shippingAddress);

        return new OrderResource($order);
    }

    public function index()
    {
        $orders = Order::with(['user', 'items', 'sale', 'store'])->get();
        return OrderResource::collection($orders);
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items', 'sale', 'store'])->findOrFail($id);
        if (!$order) {
            return response()->json([
                'status' => 'error',
                'code' => 404,
                'message' => 'Order not found',
                'data' => null,
                'api_version' => '1.0',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Order details retrieved successfully',
            'api_version' => '1.0',
            'data' => new OrderDetailsResource($order),
        ], 200);
    }
}
