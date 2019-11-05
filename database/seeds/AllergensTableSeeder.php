<?php

use Illuminate\Database\Seeder;

class AllergensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 10 Random Allergens.
        factory(App\Allergen::class, 10)->create();
    }
}
