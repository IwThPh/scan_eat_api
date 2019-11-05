<?php

use Illuminate\Database\Seeder;

class AllergenUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergens = App\Allergen::get();
        $users = App\User::get();
        foreach($users as $user){
            $user->allergens()
                 ->attach($allergens->random());
        }
    }
}
