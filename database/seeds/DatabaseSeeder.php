<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(BookingTableSeeder::class);
    }
}
