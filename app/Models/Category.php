<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // các quy ước trong 1 model

    // === quy ước tên bảng
    protected $table = 'categories';

    // tạo mối quan hệ giữa các model
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
