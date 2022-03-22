<?php

use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 30; $i < 45; $i++){
            DB::table('sizes')->insert([
                'number' => $i,
                'text' => 'text ' . $i,
                'descriptions' => null,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
