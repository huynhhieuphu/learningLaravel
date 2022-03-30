<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class OrmController extends Controller
{
    public function getData()
    {
        // === GET DATA

        //// Eloquent ORM
        // $products = Product::all();
        // dd($products->toArray());
        //// khi lấy data bằng Eloquent dùng hàm toArray() chuyển đổi kiểu object sang kiểu mảng, dễ truy xuất và dễ xem khi dump

        //// Query Builder
        // $db_products = DB::table('products')->get();
        // dd($db_products);

        //// Eloquent ORM
        // $product = Product::find(1);
        // dd($product);

        //// Query Builder
        // $db_product = DB::table('products')->find(1);
        // dd($db_product);

        //// Eloquent ORM
        // $products = Product::all(['name', 'price']);
        // dd($products->toArray());

        //// Query Builder
        // $db_products = DB::table('products')
        //                 ->select('name', 'price')
        //                 ->get();
        // dd($db_products);

        // === ONE - MANY
        // $products = Category::find(3)->products;
        // foreach($products as $product){
        //     echo $product->name . "<br>";
        // }
        // dd($products->toArray());
        
        // $category = Product::find(3)->category;
        // dd($category->name);

        // $brand = Product::find(3)->brand;
        // dd($brand->name);

        // === MANY - MANY
        // $colors = Product::find(5)->colors;
        // dd($colors->toArray());

        // $products = Color::find(4)->products;
        // dd($products->toArray());

        // $products = Size::find(2)->products;
        // dd($products->toArray());
    }

    public function insertData(Tag $tag)
    {
        // Tag $tag Tương đương với $tag = new Tag;
        
        // $tag->name = 'tag name 2';
        // $tag->slug = 'tag-slug-2';
        // $tag->seo_title = 'seo title 2';
        // $tag->seo_meta = 'seo meta 2';     
        // $tag->seo_description = 'seo description 2';
        // $tag->created_at = date('Y/m/d H:i:s');
        // $tag->updated_at = null;
        // $tag->save();
        
        // if($tag){
        //     return 'insert success';
        // }
        // return 'insert fail';
    }

    public function updateData()
    {
        // $tag = Tag::findOrFail(2);
        // $tag->name = 'ten the 2';
        // $tag->slug = 'ten-slug-2';
        // $tag->updated_at = date('Y/m/d H:i:s');
        // $tag->save();

        // if($tag){
        //     return 'update success';
        // }
        // return 'update fail';
    }

    public function deleteData()
    {
        // $tag = Tag::find(1);
        // $tag->delete();
    }

}
