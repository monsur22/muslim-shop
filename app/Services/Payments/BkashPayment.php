<?php
namespace App\Services\Payments;

use App\Services\Interfaces\PaymentStrategy;

class BkashPayment implements PaymentStrategy
{
    public function processPayment($order, $amount)
    {
        dd("this is bkash");
        // Logic for handling bKash payment
        $transactionId = 'BKASH_TRANSACTION_ID'; // Placeholder, should be the real transaction ID from bKash

        return [
            'status' => 'completed',
            'transaction_id' => $transactionId,
        ];
    }
}
 