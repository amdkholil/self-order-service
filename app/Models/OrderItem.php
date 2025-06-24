<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'price',
        'note',
        'option_id',
        'option_name',
        'option_value_id',
        'option_value_value',
        'option_value_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
