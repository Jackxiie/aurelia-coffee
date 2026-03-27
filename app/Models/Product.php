<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'type',
        'status',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public $timestamps = false;

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }
}