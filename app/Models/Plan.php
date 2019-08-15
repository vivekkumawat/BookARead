<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'features',
        'price'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
