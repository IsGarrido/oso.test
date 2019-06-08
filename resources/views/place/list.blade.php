@extends('place.places')

@section('title', "List")




@section('content2')

@forelse ($places as $place)
    <a href="{{URL::to("places/".$place->id )}} "> {{ $place->title }} </a><br>
@empty
    Sin contenido
@endforelse




@endsection
