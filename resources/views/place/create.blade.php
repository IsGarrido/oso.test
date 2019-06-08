@extends('place.places')

@section('title', 'Page Title Index')

@section('content2')

{{ Form::open(['action' => 'PlaceController@store']) }}

<div class="field">
    <label class="label">Titulo</label>
    <div class="control">
        {{ Form::text('title', null, ["class" => "input is-info", "placeholder" => 'Nombre del lugar']) }}
    </div>
</div>

<div class="columns">
    <div class="column">

        <!-- Dirección -->
        <div class="field">
            <label class="label">Dirección</label>
            <div class="control">
                {{ Form::text('address',null, ["class" => "input is-info", "placeholder" => 'Dirección']) }}
            </div>
        </div>

    </div>
    <div class="column">

        <!-- Longitud -->
        <div class="field">
            <label class="label">Longitud</label>
            <div class="control">
                {{ Form::text('longitude',  null, ["class" => "input is-info", "placeholder" => 'XXX.XXXXXXX']) }}
            </div>
        </div>
    </div>

    <div class="column">

        <!-- Latitud -->
        <div class="field">
            <label class="label">Latitud</label>
            <div class="control">
                {{ Form::text('latitude', null, ["class" => "input is-info", "placeholder" => 'YYY.YYYYYYYY']) }}
            </div>
        </div>
    </div>

</div>

<!-- Description -->
<div class="field">
    <label class="label">Descripción</label>
    <div class="control">
        {{ Form::textarea('content', null, ['class'=>'textarea is-info', "placeholder" => "Descripción"]) }}
    </div>
</div>

<div class="field">
    <label class="label">Imagen</label>
    <div class="control">
        {{ Form::text('picture', null, ["class" => "input is-info", "placeholder" => "URL"]) }}
    </div>
</div>


<div class="columns">
    <div class="column">

        <!-- Dirección -->
        <div class="field">
            <label class="label">Categoría</label>
            <div class="control">
                <div class="select is-fullwidth">
                    {{ Form::select('type', ['L' => 'Large', 'S' => 'Small'], null, ["class" => "is-fullwidth"]) }}
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
    <div class="control">
        <button class="button is-text">Cancelar</button>
    </div>
</div>
{{ Form::close() }}

@endsection
