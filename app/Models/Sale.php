<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_id',
        'sale_date',
        'amount',
        'payment_method_id',
        'return_processed',
    ];

    /**
     * Get the order associated with the sale.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // /**
    //  * Get the payment method used for the sale.
    //  */
    // public function paymentMethod()
    // {
    //     return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    // }
}
