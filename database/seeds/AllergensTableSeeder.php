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
        //Creates default allergens
        //TODO: Add appropriate descriptions.
        $a = new Allergen;
        $a->name = "Celery";
        $a->description = "Description";
        $a->alt = [1 => 'celery'];
        $a->save();
        $a = new Allergen;
        $a->name = "Gluten";
        $a->description = "Description";
        $a->alt = [1 => 'gluten'];
        $a->save();
        $a = new Allergen;
        $a->name = "Crustaceans";
        $a->description = "Description";
        $a->alt = [1 => 'crustaceans'];
        $a->save();
        $a = new Allergen;
        $a->name = "Eggs";
        $a->description = "Description";
        $a->alt = [1 => 'eggs'];
        $a->save();
        $a = new Allergen;
        $a->name = "Fish";
        $a->description = "Description";
        $a->alt = [1 => 'fish'];
        $a->save();
        $a = new Allergen;
        $a->name = "Lupin";
        $a->description = "Description";
        $a->alt = [1 => 'lupin'];
        $a->save();
        $a = new Allergen;
        $a->name = "Milk";
        $a->description = "Description";
        $a->alt = [1 => 'milk'];
        $a->save();
        $a = new Allergen;
        $a->name = "Molluscs";
        $a->description = "Description";
        $a->alt = [1 => 'molluscs'];
        $a->save();
        $a = new Allergen;
        $a->name = "Mustard";
        $a->description = "Description";
        $a->alt = [1 => 'mustard'];
        $a->save();
        $a = new Allergen;
        $a->name = "Tree Nuts";
        $a->description = "Description";
        $a->alt = [1 => 'tree nuts'];
        $a->save();
        $a = new Allergen;
        $a->name = "Peanuts";
        $a->description = "Description";
        $a->alt = [1 => 'peanuts'];
        $a->save();
        $a = new Allergen;
        $a->name = "Sesame Seeds";
        $a->description = "Description";
        $a->alt = [1 => 'sesame seeds'];
        $a->save();
        $a = new Allergen;
        $a->name = "Soybeans";
        $a->description = "Description";
        $a->alt = [1 => 'soybeans'];
        $a->save();
        $a = new Allergen;
        $a->name = "Sulphites";
        $a->description = "Description";
        $a->alt = [1 => 'sulphites'];
        $a->save();
    }
}
