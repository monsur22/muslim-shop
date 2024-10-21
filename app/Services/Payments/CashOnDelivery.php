<?php
namespace App\Services\Payments;

use App\Services\Interfaces\PaymentStrategy;

class CashOnDelivery implements PaymentStrategy
{
    public function processPayment($order, $amount)
    {
        dd("this is cash on Delevery");
        // Logic for handling Cash on Delivery
        // Typically, no additional actions are needed.
        return [
            'status' => 'pending',
            'transaction_id' => null,
        ];
    }
}
