<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // === cách đơn giản
        for($i = 1; $i < 5; $i++){
            DB::table('categories')->insert([
                'name' => 'cate name ' . $i,
                'slug' => 'cate-slug-' . $i,
                'parent_id' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
