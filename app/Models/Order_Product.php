<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    protected $table =  'order_product';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];
}
