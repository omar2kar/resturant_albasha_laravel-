<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food\Checkout;
use App\Models\Food\Food;

class CheckoutItem extends Model
{
    use HasFactory;

    protected $table = 'checkout_items'; // اسم جدول العناصر

    protected $fillable = [
        'checkout_id',
        'food_id',
        'name',
        'image',
        'price',
        'quantity',
        'total_price',
    ];

    // علاقة: العنصر ينتمي لطلب (Checkout)
    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'checkout_id', 'id');
    }

    // علاقة: العنصر يعود لطعام محدد
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
