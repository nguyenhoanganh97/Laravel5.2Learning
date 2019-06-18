<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for ($i=0; $i < 30; $i++) { 
            # code...
            $this->call(ProductTableSeeder::class);
        }
    }
}
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => str_random(10),
            'price' => rand(100000,1900000),
            'cate_id' => rand(1,13),
        ]);
    }
}