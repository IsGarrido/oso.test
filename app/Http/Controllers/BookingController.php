<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Booking;
use App\Place;

use Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->toArray();
        $arr["date"] = Carbon::parse($arr["date"]);
        $place = Place::findOrFail($arr["place_id"]);

        if(!$place->is_bookable)
            return abort(401);

        $booking = Booking::create($arr);

        return redirect()->action('BookingController@show',["id" => $booking->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $place = Place::findOrFail($booking->place_id);
        return view("booking.show", ["booking" => $booking, "place" => $place ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showPlace($place_id){


        $bookings = Booking::where("place_id",$place_id)->get();
        $place = Place::findOrFail($place_id);

        if(!Auth::check() || (!Auth::user()->is_admin && Auth::id() != $place->owner_id))
            return redirect()->action("PlaceController@index");

        return view("booking.showplace", ["bookings" => $bookings, "place" => $place]);

    }
}
