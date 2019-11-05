<?php

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
        factory(App\Diet::class, 10)->create();
    }
}
