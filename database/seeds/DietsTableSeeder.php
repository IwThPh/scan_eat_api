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
        //Creates default diets
        //TODO: Add appropriate descriptions.
        $d = new Diet;
        $d -> name = "Vegatarian";
        $d -> description = "Description";
        $d -> alt = [1 => 'vegatarian',];
        $d->save();
        $d = new Diet;
        $d -> name = "Vegan";
        $d -> description = "Description";
        $d -> alt = [1 => 'vegan',];
        $d->save();
        $d = new Diet;
        $d -> name = "Kosher";
        $d -> description = "Description";
        $d -> alt = [1 => 'kosher',];
        $d->save();
    }
}
