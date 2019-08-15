<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'plan_name',
        'plan_price',
        'duration',
        'order_id',
        'transaction_id',
        'status',
        'start_date',
        'end_date',
    ];
}
