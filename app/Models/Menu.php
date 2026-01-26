<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'image',
        'category_id',
        'description',
        'is_available',
    ];

       public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
