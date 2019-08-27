<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'products';
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
