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
        for($i = 1; $i < 4; $i++){
            DB::table('product_size')->insert([
                'product_id' => $i,
                'size_id' => 33,
            ]);
        }
    }
}
