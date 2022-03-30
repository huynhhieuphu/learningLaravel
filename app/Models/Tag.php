<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'product_tag');
    }
}
