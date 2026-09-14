<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'categories';

    // الحقول المسموح بإضافة البيانات وإدخالها فيها
    protected $fillable = [
        'name',
        'description',
    ];
}

    /**
     * علاقة الطلب بعناصر الطلب (الطلب يحتوي على عدة عناصر OrderItems)
     */
   function items()
    {
        return $this->hasMany(OrderItem::class);
    }
