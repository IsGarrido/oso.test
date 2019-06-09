<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Place;
use App\Comment;

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
        return view("place.create", ["place" => new Place(), "action" => "store" ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Place::create([
            'title' => $request->title,
            'address' => $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'content' => $request->content,
            'picture' => $request->picture,
            'type' => $request->filled('newtype') ? $request->newtype : $request->type,
            'owner_id' => Auth::id()
        ]);

        return back();

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

        return view("place.show",[ "place" => $place, "comments" => $comments, "canEdit" => $canEdit ] );
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

        if($canEdit)
            return view("place.create", ["place" => $place, "action" => "update" ] );
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

        if(Auth::check() && (Auth::user()->is_admin || Auth::id() == $place->owner_id))
            $place->delete();

        return redirect()->action("PlaceController@index");
    }

}
