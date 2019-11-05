<?php

use Illuminate\Database\Seeder;

class ProductUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = App\Product::get();
        $users = App\User::get();
        foreach($users as $user){
            $user->scanned()
                 ->attach($products->random(),
                             ['saved'=>rand(0,1)
                            ]);
        }
    }
}
