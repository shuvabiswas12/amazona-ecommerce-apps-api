<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categories_id',
        'description',
        'price',
        'stock',
        'brand',
        'image'
    ];

    protected $casts = [
        'price' => 'double',
        'stock' => 'integer',
        'categories_id' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
