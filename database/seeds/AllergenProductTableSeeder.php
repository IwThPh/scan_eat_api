<?php

use Illuminate\Database\Seeder;

class AllergenProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergens = App\Allergen::get();
        $products = App\Product::get();
        foreach($products as $product){
            $product->allergens()
                 ->attach($allergens->random());
        }
    }
}
