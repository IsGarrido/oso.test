<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\User;
use App\Place;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = User::all("id")->map(function ($user) {
            return $user->_id;
        });

        // Clear db
        DB::table('places')->delete();

        $faker = Faker::create("es_ES");

        foreach (range(1, 10) as $index) {
            Place::create([
                'title' => $faker->company." ".$faker->companySuffix,
                'address' => $faker->address,
                'content' => $faker->paragraphs(3, true),
                'picture' => $faker->imageUrl(600,400,"nightlife"),
                'type' => $faker->randomElement(['Restaurante', 'Bar', 'Cafetería', "Sala de conciertos", "Museo"]),
                'owner_id' => $faker->randomElement($ids),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'is_bookable' => $faker->boolean
            ]);
        }

    }
}
