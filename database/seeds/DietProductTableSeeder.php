<?php

use Illuminate\Database\Seeder;

class DietProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diets = App\Diet::get();
        $products = App\Product::get();
        foreach($products as $product){
            $product->diets()
                 ->attach($diets->random());
        }
    }
}
