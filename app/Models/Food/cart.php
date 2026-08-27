<?php

namespace App\Models\food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class cart extends Model
{
    use HasFactory;
    protected $table = 'cart'; // Specify the table name if it differs from the model name

    protected $fillable = [
        'id',
        'user_id',
        'food_id',
        'price',
        'name',
        'image',
        'quantity',
    ];
    public $timestamps = true; // Enable timestamps if your table has created_at and updated_at columns
}
