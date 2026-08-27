<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews'; // اسم الجدول مفرد كما طلبت
    protected $fillable = [
        'id',
        'name',
        'review',
        'created_at',
        'updated_at',
    ];
}
