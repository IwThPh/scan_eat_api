<?php

use App\Allergen;
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
        // factory(App\Allergen::class, 10)->create();

        //Creates default allergens
        //TODO: Add appropriate descriptions.
        $allergens = [];
        $allergens = Arr::add($allergens, "Celery", "desc");
        $allergens = Arr::add($allergens, "Gluten", "desc");
        $allergens = Arr::add($allergens, "Crustaceans ", "desc");
        $allergens = Arr::add($allergens, "Eggs", "desc");
        $allergens = Arr::add($allergens, "Fish", "desc");
        $allergens = Arr::add($allergens, "Lupin ", "desc");
        $allergens = Arr::add($allergens, "Milk", "desc");
        $allergens = Arr::add($allergens, "Molluscs", "desc");
        $allergens = Arr::add($allergens, "Mustard", "desc");
        $allergens = Arr::add($allergens, "Tree Nuts ", "desc");
        $allergens = Arr::add($allergens, "Peanuts", "desc");
        $allergens = Arr::add($allergens, "Sesame Seeds", "desc");
        $allergens = Arr::add($allergens, "Soybeans", "desc");
        $allergens = Arr::add($allergens, "Sulphites", "desc");

        foreach ($allergens as $name => $desc) {
            $allergen = new Allergen;
            $allergen -> name = $name;
            $allergen -> description = $desc;
            $allergen -> save();
        }
    }
}
