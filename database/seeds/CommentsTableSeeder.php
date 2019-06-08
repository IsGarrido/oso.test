<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Place;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ids = Place::all("id")->map(function($place){
            return $place->_id;
        });
        //dd($ids);


        // Clear db
        DB::table('comments')->delete();

        $faker = Faker::create();

        foreach (range(1,count($ids)*5) as $index) {
	        DB::table('comments')->insert([
                'guest_name' => $faker->name,
                'content' => $faker->sentences(2),
                'rating' => $faker->numberBetween(0, 10),
                'place_id' => $faker->randomElement($ids)
	        ]);
        }
    }
}
