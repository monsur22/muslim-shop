<?php
namespace App\Services\Payments;

use App\Services\Interfaces\PaymentStrategy;

class DuePayment implements PaymentStrategy
{
    public function processPayment($order, $amount)
    {
        dd("this is due");
        // Logic for handling due payment
        // Mark as due and might involve invoicing
        return [
            'status' => 'due',
            'transaction_id' => null,
        ];
    }
}
