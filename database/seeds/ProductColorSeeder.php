<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++){
            DB::table('product_color')->insert([
                'product_id' => rand(1, 10),
                'color_id' => rand(1, 4),
            ]);
        }
        
    }
}
