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
        $ids =  \App\User::where("is_admin", false)->pluck("_id")->toArray();

        // Clear db
        DB::table('places')->delete();

        $faker = Faker::create("es_ES");
        $images = [];
        for($i = 1; $i < 12; $i++)
            $images[$i] = url("placeimages/lorempixel$i.jpg");

        foreach (range(1, 3*count($ids)) as $index) {
            Place::create([
                'title' => $faker->company." ".$faker->companySuffix,
                'address' => $faker->address,
                'content' => $faker->paragraphs(3, true),
                //'picture' => $faker->imageUrl(600,400,"nightlife"),
                'picture' => $faker->randomElement($images),
                'type' => $faker->randomElement(['Restaurante', 'Bar', 'Cafetería', "Sala de conciertos", "Museo"]),
                'owner_id' => $faker->randomElement($ids),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'is_bookable' => $faker->boolean
            ]);
        }

    }
}
