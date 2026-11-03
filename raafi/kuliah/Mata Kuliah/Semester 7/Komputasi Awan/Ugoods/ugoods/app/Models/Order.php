<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'product_id',
        'total_price',
        'payment_status',
        'payment_type',
        'snap_token',
        'shipping_cost',
        'notes',
    ];

    /**
     * Relasi ke User (Pembeli)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Product (Barang)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}