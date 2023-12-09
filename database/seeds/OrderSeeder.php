<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'order_date' => '2012.10.20',
            'quantity' => '4',
            'user_id'=>'1',
            'total' => '8900',
            'payment_id'=>'1',
            'shipping_id'=>'2'
        ]);

    }
}
