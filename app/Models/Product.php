<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'product_color', 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size', 'product_size');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'product_tag');
    }
}
