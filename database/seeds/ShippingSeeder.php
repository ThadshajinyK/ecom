<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippings')->insert([
            'user_id' => '1',
            'fname' => 'vio',
            'lname'=>'jan',
            'address'=>'kondavil',
            'phone_no' => '0789965896',
            'email' => 'vjaijnugihaij@gmail.com'
        ]);

        DB::table('shippings')->insert([
            'user_id' => '2',
            'fname' => 'ano',
            'lname'=>'jan',
            'address' => 'jaffna',
            'phone_no' => '0779965896',
            'email' => 'vjaijgihaij@gmail.com'
        ]);

        DB::table('shippings')->insert([
            'user_id' => '1',
            'address' => 'nelliady',
            'fname' => 'vio',
            'lname'=>'jan',
            'phone_no' => '0789965896',
            'email' => 'vjaijugihaij@gmail.com'
        ]);
    }
}
