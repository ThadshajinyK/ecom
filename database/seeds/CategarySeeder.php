<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categaries')->insert([
            'categary_name' => 'Mens',
        ]); 

        DB::table('categaries')->insert([
            'categary_name' => 'Womens',
        ]); 

        DB::table('categaries')->insert([
            'categary_name' => 'shirt',
        ]);

        DB::table('categaries')->insert([
            'categary_name' => 'jeans',
        ]);
    }
}
