<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Co Shirt',
            'categary_id' => 3,
            'price'=>'2800',
            'qty'=>'560',
            'color' => 'red',
            'description' => 'Mrns',
            'image'=>"image('../public/webphoto/a.jpg')"
        ]);

        DB::table('products')->insert([
            'product_name' => 'Jilla Shirt',
            'categary_id' => 3,
            'price'=>'2800',
            'qty'=>'560',
            'description' => 'Mrns',
            'image'=>"image('../public/webphoto/a.jpg')"
        ]);

        DB::table('products')->insert([
            'product_name' => 'Master Shirt',
            'categary_id' => 3,
            'price'=>'2800',
            'qty'=>'560',
            'description' => 'Mrns',
            'image'=>"image('../public/webphoto/a.jpg')"
        ]);

        DB::table('products')->insert([
            'product_name' => 'Master Jeans',
            'categary_id' => 4,
            'price'=>'2800',
            'qty'=>'560',
            'description' => 'Mrns',
            'image'=>"image('../public/webphoto/a.jpg')"
        ]);
    }
}
