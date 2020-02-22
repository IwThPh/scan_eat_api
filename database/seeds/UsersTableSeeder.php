<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create(['email'=>'test@example.test']);
        //Create 30 Users.
        factory(App\User::class, 30)->create();
    }
}
