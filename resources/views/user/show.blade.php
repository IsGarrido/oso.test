@extends('user.user')

@section('title', "Perfil del usuario ".$user->name)



@section("content2")


<div class="columns">
    <div class="column">
        <h1 class="title">Datos del usuario @if($user->is_admin) (Administrador) @endif @if($user->is_blocked) (Bloqueado) @endif </h1>
        <ul>
            <li><b>Nombre: </b>{{ $user->name }}</li>
            <li><b>Mail: </b>{{ $user->email }}</li>
            <li><b>Cuenta creada: </b>{{ $user->created_at->diffForHumans() }}</li>
        </ul>
    </div>

    @if(!$user->is_admin)
    <div class="column">
        <h1 class="title">Acciones</h1>

        {{ Form::open(["action" => ["UserController@destroy", $user->id], "class" => "is-inline"]) }}
        @method('delete')
        {{ Form::button("Eliminar cuenta",["class" => "button is-danger is-inline", "type" => "submit"]) }}
        {{ Form::close() }}


        @if(Auth::user()->is_admin)
        <!-- Block -->
        {{ Form::open(["action" => ["UserController@toggleblock", $user->id], "class" => "is-inline"]) }}
        @method('patch')
        {{ Form::button($user->is_blocked === true ? "Desbloquear" : "Bloquear",["class" => "button is-warning  is-inline", "type" => "submit"]) }}
        {{ Form::close() }}
        @endif
    </div>
    @endif




</div>

<h1 class="title">Listado de establecimientos</h1>

@if(!$places->isEmpty())
<table class="table is-bordered is-striped is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Tipo</th>
            <th>Reservas</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($places as $place)
        <tr>
            <th><a href="{{action("PlaceController@show",["id" => $place->id]) }}">{{ $place->title }}</th>
            <td>{{ $place->address }}</td>
            <td>{{ $place->type }}</td>
            <td>{{ $place->is_bookable === false ? "Si" : "No" }}</td>
            <td>{{ $place->created_at->toDateString() }}</td>
            <td>
                <!-- Edit -->
                {{ Form::open(["action" => ["PlaceController@edit", $place->id], "class" => "is-inline"]) }}
                @method('get')
                {{ Form::button("Editar",["class" => "button is-info   is-inline", "type" => "submit"]) }}
                {{ Form::close() }}

                <!-- Delete -->
                {{ Form::open(["action" => ["PlaceController@destroy", $place->id], "class" => "is-inline"]) }}
                @method('delete')
                {{ Form::button("Eliminar",["class" => "button is-danger is-inline", "type" => "submit"]) }}
                {{ Form::close() }}


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else

<div class="notification">
    Este usuario no tiene establecimientos.
</div>


@endif

@endsection
