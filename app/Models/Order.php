<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'status',
        'total_price',
        'first_name',
        'last_name',
        'country',
        'street_address',
        'town',
        'zip_code',
        'phone',
        'email',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}