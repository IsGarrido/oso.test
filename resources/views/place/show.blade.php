@extends('place.places')

@section('title', $place->title)




@section('content2')

<h1 class="title is-inline">{{ $place->title }}</h1>

<div class="columns">
    <div class="column">
        <p>
            {{ $place->content }}
        </p>

        <div class="place-detail">
            <p class="subtitle">Información</p>
            <ul>
                <li><b>Dirección: </b>{{ $place->address }}</li>
            <li><b>Longitud: </b><a href="https://www.google.com/maps/place/{{$place->longitude}},{{ $place->latitude }}/">{{ $place->longitude }}</a></li>
                <li><b>Latitud: </b><a href="https://www.google.com/maps/place/{{$place->longitude}},{{ $place->latitude }}/">{{ $place->latitude }}</a></li>
                <li><b>Tipo: </b>{{ $place->type }} </li>
            </ul>

            <!-- Controles -->
            @if($canEdit)
            <div class="buttons has-addons is-right">
                <a class="button is-text is-inline" href=" {{ URL::to('places/'.$place->id."/edit") }}">Editar</a>
                {{ Form::open(["action" => ["PlaceController@destroy", $place->id], "class" => "is-inline"]) }}
                @method('delete')
                {{ Form::submit("Eliminar",["class" => "button is-danger is-inline"]) }}
                {{ Form::close() }}
            </div>
            @endif


        </div>

        <!-- Reservas -->
        <div class="place-detail">
            <p class="subtitle">Reservar</p>
            {{ Form::open(['action' => ["BookingController@store"]]) }}
            {{ Form::hidden('place_id',$place->id) }}

            <div class="columns">
                <div class="column">
                    {{ Form::text('name', Auth::check() ? Auth::user()->name : null, ["class" => "input is-info", "placeholder" => 'Nombre']) }}
                </div>
                <div class="column">
                    {{ Form::text('email', Auth::check() ? Auth::user()->email : null, ["class" => "input is-info is-fullwidth", "placeholder" => 'Mail']) }}
                </div>
                <div class="column">

                    <div class="select ">
                        <select name="date" class="">
                            @foreach($booking_dates as $date)
                            <option value="{{ $date }} ">{{ $date }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="column">
                    {{ Form::submit("Reservar",["class" => "button is-info is-inline"]) }}
                </div>
            </div>

            {{ Form::close() }}
        </div>

    </div>

    <div class="column">
        <img src="{{ $place->picture }}">
    </div>
</div>


<h1 class="title">Valorar</h1>

{{ Form::open(["action" => "CommentController@store"]) }}

{{ Form::hidden('place_id',$place->id) }}
{{ Form::hidden('rating',1) }}
<div class="columns">
    <div class="column">

        <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
                {{ Form::text('guest_name', Auth::check() ? Auth::user()->name : null , ["class" => "input is-info", "placeholder" => 'Usuario']) }}
            </div>
        </div>

    </div>

    <div class="column">

        <div class="field">
            <label class="label">Valoración</label>
            <div class="control">
                <div class="select is-fullwidth">

                    <select name="is_positive" class="is-fullwidth is-info">
                        <option value="true"> Mi valoración es positiva </option>
                        <option value="false"> Mi valoración es negativa </option>
                    </select>

                </div>
            </div>
        </div>






    </div>
</div>

<article class="media">
    <div class="media-content">
        <div class="field">
            <p class="control">
                {{ Form::textarea('content', null, ["placeholder" => "Escribe tu reseña...", 'class'=>'textarea is-info', "placeholder" => "Descripción"]) }}
            </p>
        </div>
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    {!! Form::submit("Enviar", ["class" => "button is-info"]) !!}
                </div>
            </div>
        </nav>
    </div>
</article>
{{ Form::close() }}

<hr>

@forelse ($comments as $comment)

<article class="media">
    <figure class="media-left">
        <p class="image is-64x64">
            <img src="{{ $comment->is_positive ? asset("img/positive.png") : asset("img/negative.png") }}">
        </p>
    </figure>
    <div class="media-content">
        <div class="content">
            <p>
                <strong>{{ $comment->guest_name }}</strong>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
                <br>
                {{ $comment->content }}
            </p>
        </div>
    </div>
    @if($canEdit)
    <div class="media-right">
        {{ Form::open(["action" => ["CommentController@destroy", $comment->id], "class" => "is-inline"]) }}
        @method('delete')
        {{ Form::button("Eliminar",["class" => "delete", "type" => "submit"]) }}
        {{ Form::close() }}
    </div>
    @endif
</article>

@empty
<p> Aún no hay comentarios </p>
@endforelse



@endsection
