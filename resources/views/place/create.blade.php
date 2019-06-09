@extends('place.places')

@section('title', 'Crear nueva localización')

@section('content2')

{{ Form::open(['action' => ["PlaceController@".$action , $place->id]]) }}

@if($action == "update")
@method('patch')
@endif

<div class="field">
    <label class="label">Titulo</label>
    <div class="control">
        {{ Form::text('title', $place->title, ["class" => "input is-info", "placeholder" => 'Nombre del lugar']) }}
    </div>
</div>

<div class="columns">
    <div class="column">

        <!-- Dirección -->
        <div class="field">
            <label class="label">Dirección</label>
            <div class="control">
                {{ Form::text('address',$place->address, ["class" => "input is-info", "placeholder" => 'Dirección']) }}
            </div>
        </div>

    </div>
    <div class="column">

        <!-- Longitud -->
        <div class="field">
            <label class="label">Longitud</label>
            <div class="control">
                {{ Form::text('longitude',  $place->longitude, ["class" => "input is-info", "placeholder" => 'XXX.XXXXXXX']) }}
            </div>
        </div>
    </div>

    <div class="column">

        <!-- Latitud -->
        <div class="field">
            <label class="label">Latitud</label>
            <div class="control">
                {{ Form::text('latitude', $place->latitude, ["class" => "input is-info", "placeholder" => 'YYY.YYYYYYYY']) }}
            </div>
        </div>
    </div>

</div>

<!-- Description -->
<div class="field">
    <label class="label">Descripción</label>
    <div class="control">
        {{ Form::textarea('content', $place->content, ['class'=>'textarea is-info', "placeholder" => "Descripción"]) }}
    </div>
</div>

<div class="field">
    <label class="label">Imagen</label>
    <div class="control">
        {{ Form::text('picture', $place->picture, ["class" => "input is-info", "placeholder" => "URL"]) }}
    </div>
</div>


<div class="columns">
    <div class="column">

        <!-- Dirección -->
        <div class="field">
            <label class="label">Categoría</label>
            <div class="control">
                <div class="select is-fullwidth">
                    {{ Form::select('type', $placeTypes, $place->type, ["class" => "is-fullwidth"]) }}
                </div>

            </div>
        </div>

    </div>
    <div class="column">

        <!-- Longitud -->
        <div class="field">
            <label class="label">Nueva categoría</label>
            <div class="control">
                {{ Form::text('newtype', null, ["class" => "input is-info"]) }}
            </div>
        </div>
    </div>


</div>

<div class="field is-grouped">
    <div class="control">
        <button class="button is-link is-fullwidth">Enviar</button>
    </div>

    @if($action == "update")
    <span>
        <a class="button is-text" href=" {{ URL::to('places/'.$place->id) }}">Ver</a>
    </span>
    @endif
</div>
{{ Form::close() }}

@endsection
