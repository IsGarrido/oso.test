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
        return redirect()->action("PlaceController@index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->action("PlaceController@index");
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

        if (!$place->is_bookable)
            return abort(401);

        $booking = Booking::create($arr);

        mail($booking->guest_email, "Reserva con id " . $booking->id, "La reserva para el día " . $booking->date . " se ha realizado con exíto.\nPuede consultar más información en el enlace " . action("BookingController@show", ["id" => $booking->id]) );

        return redirect()->action('BookingController@show', ["id" => $booking->id]);
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
        return view("booking.show", ["booking" => $booking, "place" => $place]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->action("PlaceController@index");
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
        return redirect()->action("PlaceController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->action("PlaceController@index");
    }

    public function showPlace($place_id)
    {

        $bookings = Booking::where("place_id", $place_id)->get();
        $place = Place::findOrFail($place_id);

        if (!Auth::check() || (!Auth::user()->is_admin && Auth::id() != $place->owner_id))
            return redirect()->action("PlaceController@index");

        return view("booking.showplace", ["bookings" => $bookings, "place" => $place]);
    }
}
