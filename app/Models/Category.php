<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_categories';

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
