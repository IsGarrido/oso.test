<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Place;
use App\Comment;
use Carbon\Carbon;

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

        // Clear db
        DB::table('comments')->delete();

        $faker = Faker::create("es_ES");
        $date = Carbon::today()->subDays(30);

        foreach (range(1,count($ids)*5) as $index) {
	        Comment::create([
                'guest_name' => $faker->name,
                'content' => $faker->sentence()."\n".$faker->sentence(),
                'is_positive' => $faker->boolean,
                'place_id' => $faker->randomElement($ids),
                'created_at' => $date->addDays(rand(0,10))->addHours(rand(0,20)),
	        ]);
        }
    }
}
