<?php

namespace App\Http\Controllers\Query;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    public function getData()
    {
        // $products = DB::table('products')->get();
        // dd($products);

        // $product = DB::table('products')
        //             ->where('price', '=', 100000)
        //             ->first();
        // dd($product);

        $product = DB::table('products')->find(2);
        dd($product->name);
    }

    public function querySelect()
    {
        $products = DB::table('products as p')
                    ->select('p.name as ProductName', 'p.price')
                    ->get();
        dd($products);
    }

    public function queryAgg()
    {
        $total = DB::table('products')->sum('price');
        // dd($total);

        // SELECT COUNT('id') FROM products
        $count = DB::table('products')->count();
        dd($count);
    }

    public function queryWhere()
    {
        // $sizes = DB::table('sizes')
        //         ->where('number', '>=', 38)
        //         ->get();
        // dd($sizes);

        // OR
        // $sizes = DB::table('sizes')
        //         ->where('number', '>=', 38)
        //         ->where('number', '<=', 40)
        //         ->orWhere('number', 36)
        //         ->get();
        // dd($sizes);

        // whereIn / whereNotIn
        // $colors = DB::table('colors')
        //             ->whereIn('id', [1,2,4,5,7])
        //             ->get();

        // $colors = DB::table('colors')
        //             ->whereNotIn('id', [1,2,4,5,7])
        //             ->get();
        // dd($colors);

        // whereBetween /whereNotBetween
        // $sizes = DB::table('sizes')
        //         ->whereBetween('number', [39,41])
        //         ->get();

        // $sizes = DB::table('sizes')
        //         ->whereNotBetween('number', [33,41])
        //         ->get();
        // dd($sizes);

        // whereNull / whereNotNull
        // $products = DB::table('products')
        //             ->whereNull('updated_at')
        //             ->get();

        // $products = DB::table('products')
        //             ->whereNotNull('updated_at')
        //             ->get();
        // dd($products);

        // whereDate / whereMonth / whereYear / whereTime
        $products = DB::table('products')
                    ->whereDate('created_at', '22')
                    ->dd();
        dd($products);

    }

    public function querySearch()
    {
        $products = DB::table('products')
                    ->where('name', 'like', '%thao%')
                    ->get();
        dd($products);
    }

    public function queryJoin()
    {
        // $products = DB::table('products as p')
        //             ->join('categories as c', 'p.category_id', '=' , 'c.id')
        //             ->join('brands as b', 'p.brand_id', 'b.id')
        //             ->select('p.*', 'b.name as brand', 'c.name as category')
        //             ->first();
        // dd($products);

        // select `p`.`name` as `product`, `c`.`name` as `color`, `s`.`name` as `size` 
        // from `products` as `p` 
        // inner join `product_color` as `pc` on `p`.`id` = `pc`.`product_id` 
        // inner join `colors` as `c` on `pc`.`color_id` = `c`.`id` 
        // inner join `product_size` as `ps` on `p`.`id` = `ps`.`product_id` 
        // inner join `sizes` as `s` on `ps`.`size_id` = `s`.`id` 
        // where `p`.`id` = 

        // $product = DB::table('products as p')
        //             ->join('product_color as pc', 'p.id', 'pc.product_id')
        //             ->join('colors as c', 'pc.color_id', 'c.id')
        //             ->join('product_size as ps', 'p.id', 'ps.product_id')
        //             ->join('sizes as s', 'ps.size_id', 's.number')
        //             ->select('p.name as product', 'c.name as color', 's.number as size')
        //             ->where('p.id', 1)
        //             ->get();
        // dd($product);

        // SELECT * FROM `products` WHERE `id` IN (1,2,3)
        $products = DB::table('products')->whereIn('id', [1,2])->get();
        dd($products);
    }

    public function queryLimitData()
    {
        // $sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
        // $colors = DB::table('colors')->offset(3)->limit(5)->get();

        // skip()-take() tương tự offset()->limit()
        $colors = DB::table('colors')->skip(3)->take(5)->get();
        dd($colors);
    }

    public function queryInsert()
    {
        // DB::table('tags')->insert([
        //     [
        //         'name' => 'tag name 1',
        //         'slug' => 'tag-name-1',
        //         'seo_title' =>  null,
        //         'seo_meta' => null,
        //         'seo_description' => null,
        //         'created_at' => date('Y-m-d H:s:i'),
        //         'updated_at' => null
        //     ],
        //     [
        //         'name' => 'tag name 2',
        //         'slug' => 'tag-name-2',
        //         'seo_title' =>  null,
        //         'seo_meta' => null,
        //         'seo_description' => null,
        //         'created_at' => date('Y-m-d H:s:i'),
        //         'updated_at' => null
        //     ],
        //     [
        //         'name' => 'tag name 3',
        //         'slug' => 'tag-name-3',
        //         'seo_title' =>  null,
        //         'seo_meta' => null,
        //         'seo_description' => null,
        //         'created_at' => date('Y-m-d H:s:i'),
        //         'updated_at' => null
        //     ],
        // ]);
    }

    public function queryUpdate()
    {
        // DB::table('tags')->where('id', 2)->update([
        //     'name' => 'Giay đi chơi',
        //     'slug' => 'giay-di-choi',
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
    }

    public function queryDelete()
    {
        // DB::table('tags')->where('id', 2)->delete();
    }
}
