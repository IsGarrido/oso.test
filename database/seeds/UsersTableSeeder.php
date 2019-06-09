<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\User;

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
        User::create([
            'name' => "Admin",
            'email' => "admin@oso.test",
            'password' => bcrypt('secret'),
            'is_admin' => true,
            'is_blocked' => false
        ]);

        $faker = Faker::create("es_ES");
    	foreach (range(1,10) as $index) {
	        User::create([
	            'name' => $faker->name,
	            'email' => $faker->email,
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'is_blocked' => false
	        ]);
        }

    }
}
