<?php

use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'name'       => 'COLOR',
        ]);

        DB::table('attributes')->insert([
            'name'       => 'SIZE',
        ]);

        DB::table('attributes')->insert([
            'name'       => 'BRAND',
        ]);
    }
}
