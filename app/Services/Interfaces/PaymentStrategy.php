<?php
namespace App\Services\Interfaces;

interface PaymentStrategy
{
    public function processPayment($order, $amount);
}
