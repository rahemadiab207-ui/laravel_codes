<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    
    protected $table = 'categories';

    
    protected $fillable = [
        'name',
        'description',
    ];
}

    
   function items()
    {
        return $this->hasMany(OrderItem::class);
    }
