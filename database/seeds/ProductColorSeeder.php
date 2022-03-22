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
        for($i = 1; $i < 4; $i++){
            DB::table('product_color')->insert([
                'product_id' => $i,
                'color_id' => $i,
            ]);
        }
        
    }
}
