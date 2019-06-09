<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


use App\Place;
use App\Booking;
use Carbon\Carbon;

class BookingTableSeeder extends Seeder
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
        DB::table('bookings')->delete();

        $faker = Faker::create("es_ES");
        $date = Carbon::today();

        foreach (range(1,count($ids)*5) as $index) {
	        Booking::create([
                'guest_name' => $faker->name,
                'guest_email' => $faker->email,
                'date' => $date->addDays(rand(0,3))->addHours(rand(18,23)),
                'place_id' => $faker->randomElement($ids)
	        ]);
        }

    }
}
