<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Seeders\UserSeeder;
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
        // User::factory(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(adsSeed::class);
        $this->call(SliderSeeder::class);
    }
}
