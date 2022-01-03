<?php

namespace Database\Seeders;

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
        // déclare les classes qui seront executées lors de l'appel de
        // php artisan db:seed
        $this->call([
            CountrySeeder::class,
            GenreSeeder::class,
            UserSeeder::class,
            ShowSeeder::class,
        ]);
    }
}
