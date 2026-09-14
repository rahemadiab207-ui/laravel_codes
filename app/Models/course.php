<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // الحقول المسموح بالتعديل عليها وإضافتها
    protected $fillable = [
        'name',
        'description',
        'id',
    ];
}