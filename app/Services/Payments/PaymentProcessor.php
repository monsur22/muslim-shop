<?php
namespace App\Services\Payments;

class PaymentProcessor
{
    public function process($paymentMethod, $order, $amount)
    {
        $paymentStrategy = $this->getPaymentStrategy($paymentMethod);
        return $paymentStrategy->processPayment($order, $amount);
    }

    protected function getPaymentStrategy($paymentMethod)
    {
        // dd(config('payment_methods'));
        switch ($paymentMethod) {
            case config('payment_methods.CASH'):
                return new CashPayment();
            case config('payment_methods.CASH_ON_DELIVERY'):
                return new CashOnDelivery();
            case config('payment_methods.PAYPAL'):
                return new PayPalPayment();
            case config('payment_methods.BKASH'):
                return new BkashPayment();
            case config('payment_methods.DUE'):
                return new DuePayment();
            default:
                throw new \Exception('Invalid payment method');
        }
    }
}
