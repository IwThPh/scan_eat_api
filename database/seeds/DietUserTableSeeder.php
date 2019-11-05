<?php

use Illuminate\Database\Seeder;

class DietUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diets = App\Diet::get();
        $users = App\User::get();
        foreach($users as $user){
            $user->diets()
                 ->attach($diets->random());
        }
    }
}
