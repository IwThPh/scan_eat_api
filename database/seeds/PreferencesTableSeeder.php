<?php

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Preferences for all Users.
        $users = App\User::get();
        foreach ($users as $user) {
            factory(App\Preference::class)->create()->user()->associate($user);
        }
    }
}
