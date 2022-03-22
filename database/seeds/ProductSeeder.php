<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 4; $i++){
            DB::table('products')->insert(
                [
                    'name' => 'san pham' . $i,
                    'slug' => 'san-pham-' . $i,
                    'image' => Str::random(20).'.jpg',
                    'category_id' => $i,
                    'brand_id' => $i,
                    'quantity' => 10,
                    'price' => 100000,
                    'sale_off' => 0,
                    'code' => null,
                    'count_view' => 1,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => null
                ]
            );
        }
        
    }
}
