<?php

use App\Diet;
use Illuminate\Database\Seeder;

class DietsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 10 Random Diets.
        // factory(App\Diet::class, 10)->create();

        //Creates default diets
        //TODO: Add appropriate descriptions.
        $diets = [];
        $diets = Arr::add($diets, "Vegatarian", "desc");
        $diets = Arr::add($diets, "Vegan", "desc");
        $diets = Arr::add($diets, "Kosher ", "desc");

        foreach ($diets as $name => $desc) {
            $diet = new Diet;
            $diet -> name = $name;
            $diet -> description = $desc;
            $diet -> save();
        }
    }
}
