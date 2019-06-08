<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Clear db
        DB::table('users')->delete();


        // Add admin
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@oso.test",
            'isAdmin' => true
        ]);

        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
	        ]);
        }

    }
}
