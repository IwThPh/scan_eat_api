<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class OpenFoodFactsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $baseUrl = env('OPEN_FOOD_FACTS_URL', 'https://world.openfoodfacts.org/api/v0/');

        $this->app->singleton('GuzzleHttp\Client', function($api) use ($baseUrl){
            return new Client([
                'base_uri' => $baseUrl,
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
