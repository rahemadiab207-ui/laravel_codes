<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'order_items';

    // الحقول المسموح بإضافة البيانات وإدخالها فيها
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    
     
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