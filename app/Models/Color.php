<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_color', 'color_id', 'product_id');
    }
}
