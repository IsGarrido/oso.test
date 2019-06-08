<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = User::all("id")->map(function($user){
            return $user->_id;
        });

        // Clear db
        DB::table('places')->delete();

        $faker = Faker::create();

        foreach (range(1,30) as $index) {
	        DB::table('places')->insert([
                'title' => $faker->name,
                'address' => $faker->address,
	            'content' => $faker->paragraphs(3, true),
	            'picture' => $faker->imageUrl,
                'type' => $faker->randomElement(['Restaurante', 'Bar', 'Cafetería', "Sala de conciertos", "Museo"]),
                'owner_id' => $faker->randomElement($ids)
	        ]);
        }
    }
}
