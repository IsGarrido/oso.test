<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Place;
use App\Comment;
use App\User;

use Illuminate\Support\Carbon;

use Auth;


class PlaceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view("place.list",["places" => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $placeTypes =  Place::groupBy("type")->pluck("type")->toArray();
        return view("place.create", ["place" => new Place(), "action" => "store", "placeTypes" => $placeTypes ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $place = Place::create([
            'title' => $request->title,
            'address' => $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'content' => $request->content,
            'picture' => $request->picture,
            'type' => $request->filled('newtype') ? $request->newtype : $request->type,
            'is_bookable' => $request->has('is_bookable'),
            'owner_id' => Auth::id()
        ]);

        return redirect()->action('PlaceController@show',["id" => $place->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::findOrFail($id);
        $comments = Comment::where("place_id", $id)->get();
        $canEdit = Auth::check() && (Auth::user()->is_admin || Auth::id() == $place->owner_id);
        $owner = User::findOrFail($place->owner_id);
        $dates = array();

        for($i = 0; $i < 3; $i++){
            array_push($dates, Carbon::today()->add($i, 'day')->add(18,'hour'));
            array_push($dates, Carbon::today()->add($i, 'day')->add(20,'hour'));
            array_push($dates, Carbon::today()->add($i, 'day')->add(22,'hour'));
        }

        return view("place.show",[
            "place" => $place,
            "comments" => $comments,
            "canEdit" => $canEdit,
            "booking_dates" => $dates,
            "owner" => $owner
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::findOrFail($id);
        $canEdit = Auth::check() && (Auth::user()->is_admin || Auth::id() == $place->owner_id);
        $placeTypes =  Place::groupBy("type")->pluck("type")->toArray();

        if($canEdit)
            return view("place.create", ["place" => $place, "action" => "update", "placeTypes" => $placeTypes ] );
        else
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
        $place = Place::findOrFail($id);
        $canEdit = Auth::check() && (Auth::user()->is_admin || Auth::id() == $place->owner_id);
        if(!$canEdit)
            return redirect()->action("PlaceController@index");

        $place->title = $request->title;
        $place->address = $request->address;
        $place->longitude = $request->longitude;
        $place->latitude = $request->latitude;
        $place->content = $request->content;
        $place->picture = $request->picture;
        $place->is_bookable = $request->has('is_bookable');
        $place->type = $request->filled('newtype') ? $request->newtype : $request->type;

        $place->save();

        return redirect()->action('PlaceController@show',["id" => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        $comments = Comment::where("place_id", $place->id)->get();

        if(Auth::check() && (Auth::user()->is_admin || Auth::id() == $place->owner_id)){

            foreach($comments as $comment)
                $comment->delete();

            $place->delete();
        }


        return redirect()->action('UserController@show',["id" => $place->owner_id]);
    }

}
