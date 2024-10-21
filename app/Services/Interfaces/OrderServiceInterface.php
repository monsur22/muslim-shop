<?php

namespace App\Services\Interfaces;

interface OrderServiceInterface
{
    public function createOrder($user, $items, $paymentMethodId, $paymentMethod, $request, $shippingAddress);
}
