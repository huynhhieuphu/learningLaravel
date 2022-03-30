<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++){
            DB::table('product_size')->insert([
                'product_id' => rand(1, 10),
                'size_id' => rand(1, 5),
            ]);
        }
    }
}
