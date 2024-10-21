<?php
namespace App\Services\Payments;

use App\Services\Interfaces\PaymentStrategy;

class CashPayment implements PaymentStrategy
{
    public function processPayment($order, $amount)
    {
        // dd("this is cash");
        // Logic for handling Cash on Delivery
        // Typically, no additional actions are needed.
        return [
            'status' => 'completed',
            'transaction_id' => null,
        ];
    }
}
