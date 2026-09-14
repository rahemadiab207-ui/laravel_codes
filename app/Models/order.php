<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'orders';

    // الحقول المسموح بإضافة البيانات وإدخالها فيها
    protected $fillable = [
        'user_id',
        'status',
        'total_price',
    ];

    /**
     * علاقة الطلب بالمستخدم (الطلب ينتمي لمستخدم واحد)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * علاقة الطلب بعناصر الطلب (الطلب يحتوي على عدة عناصر OrderItems)
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}