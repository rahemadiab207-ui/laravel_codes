<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];

    // الطلب ينتمي إلى مستخدم واحد
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // الطلب يحتوي على عدة عناصر (OrderItems)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}