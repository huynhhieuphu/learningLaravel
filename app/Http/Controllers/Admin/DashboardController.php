<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'Danh sach san pham';

        $data['products'] = [
            [
                'id' => 1,
                'productName' => '<script>alert(\'iphone 12 64GB\')</script>',
                'price' => 18190000
            ],
            [
                'id' => 2,
                'productName' => 'ipad pro 11 inch m1 2021 wifi',
                'price' => 19490000
            ],
            [
                'id' => 3,
                'productName' => 'ipad air 64gb wifi',
                'price' => 14990000
            ],
        ];
        
        // tham số thứ 2 view => cho phép truyền dữ liệu qua view
        return view('dashboard.index', $data);
    }
}
