<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Generate Users and their preferences.
        $this->call(UsersTableSeeder::class);
        $this->call(PreferencesTableSeeder::class);

        //Generate Products and attach some products to each users scan history.
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductUserTableSeeder::class);

        //Generate Allergens and attach to Users and Products.
        $this->call(AllergensTableSeeder::class);
        $this->call(AllergenUserTableSeeder::class);
        $this->call(AllergenProductTableSeeder::class);

        //Generate Diets and attach to Users and Products.
        $this->call(DietsTableSeeder::class);
        $this->call(DietUserTableSeeder::class);
        $this->call(DietProductTableSeeder::class);
    }
}
