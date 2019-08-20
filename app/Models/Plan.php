<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'features',
        'price',
        'security_deposit'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $appends =['total_price'];

    public function getTotalPriceAttribute()
    {
        return $this->price + $this->security_deposit;
    }
}
