<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Place;
use App\Comment;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin')->except(['show', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where("is_admin", "!=", true)->get();
        return view("user.list", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->action("PlaceController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $places = Place::where("owner_id", $id)->get();
        return view("user.show", ["user" => $user, "places" => $places]);
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
        $user = User::findOrFail($id);
        if ($user->is_admin)
            return redirect()->action("PlaceController@index");

        $places = Place::where("owner_id", $id)->get();

        if (!Auth::check() || (!Auth::user()->is_admin && Auth::id() != $user->id))
            return redirect()->action("PlaceController@index");

        foreach ($places as $place) {

            $comments = Comment::where("place_id", $place->id)->get();
            foreach ($comments as $comment)
                $comment->delete();

            $place->delete();
        }

        $user->delete();



        return redirect()->action("PlaceController@index");;
    }

    public function toggleblock($id)
    {

        $user = User::findOrFail($id);
        $user->is_blocked = !$user->is_blocked;

        if (Auth::check() && Auth::user()->is_admin)
            $user->save();

        return back();
    }
}
