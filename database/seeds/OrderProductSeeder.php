<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order__products')->insert([
            'order_id' => '1',
            'product_id' => '4',
            'qty'=>'2',
            'price' => '900',
        ]);

        DB::table('order__products')->insert([
            'order_id' => '1',
            'product_id' => '5',
            'qty'=>'15',
            'price' => '1900',
        ]);

        DB::table('order__products')->insert([
            'order_id' => '2',
            'product_id' => '4',
            'qty'=>'2',
            'price' => '900',
        ]);

        DB::table('order__products')->insert([
            'order_id' => '3',
            'product_id' => '4',
            'qty'=>'12',
            'price' => '9000',
        ]);
    }
}
