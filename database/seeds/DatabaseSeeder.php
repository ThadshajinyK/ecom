<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
       // $this->call(UsersTableSeeder::class);
       // $this->call(ProductSeeder::class);
        //$this->call(CategarySeeder::class);
        //$this->call(OrderSeeder::class);
        //$this->call(OrderProductSeeder::class);
        //$this->call(ShippingSeeder::class);
    }
}
