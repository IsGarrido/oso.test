<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Place;
use App\Comment;

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

        $faker = Faker::create("es_ES");

        foreach (range(1,count($ids)*5) as $index) {
	        Comment::create([
                'guest_name' => $faker->name,
                'content' => $faker->sentence()."\n".$faker->sentence(),
                'rating' => $faker->numberBetween(0, 10),
                'place_id' => $faker->randomElement($ids)
	        ]);
        }
    }
}
