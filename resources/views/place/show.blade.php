@extends('place.places')

@section('title', $place->title)




@section('content2')

<h1 class="title is-inline">{{ $place->title }}</h1>
@if($canEdit)
<span>
    <a class="button is-text" href=" {{ URL::to('places/'.$place->id."/edit") }}">Editar</a>
</span>
{{ Form::open(["action" => ["PlaceController@destroy", $place->id]]) }}
@method('delete')
<span>
    {{ Form::submit("Eliminar",["class" => "button is-text is-danger"]) }}
    <!--<a class="button is-text is-danger" href=" {{ URL::to('places/'.$place->id."") }}">Eliminar</a> -->
</span>
{{ Form::close() }}
@else
<!--
    {{ $place->owner_id }}
 -->
@endif

<div class="columns">
    <div class="column">
        <p>
            {{ $place->content }}
        </p>

        <div class="place-detail">
            <p class="subtitle">Información</p>
            <ul>
                <li><b>Dirección: </b>{{ $place->address }}</li>
                <li><b>Longitud: </b>{{ $place->longitude }}</li>
                <li><b>Latitud: </b>{{ $place->latitude }}</li>
                <li><b>Tipo: </b>{{ $place->type }} </li>
            </ul>

        </div>


    </div>
    <div class="column">
        <img src="{{ $place->picture }}">
    </div>
</div>



@endsection
