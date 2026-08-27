<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food\CheckoutItem;
use App\Models\User;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout'; // اسم الجدول مفرد كما طلبت

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'town',
        'country',
        'zipcode',
        'phone_number',
        'address',
        'total_price',
        'status'
    ];

    // علاقة: الطلب يحتوي على عدة عناصر (CheckoutItems)
    public function items()
    {
        return $this->hasMany(CheckoutItem::class, 'checkout_id', 'id');
    }

    // علاقة: الطلب يعود لمستخدم محدد
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
