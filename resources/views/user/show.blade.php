@extends('user.user')

@section('title', "List")



@section("content2")


<div class="columns">
    <div class="column">
        <h1 class="title">Datos del usuario</h1>
        <ul>
            <li><b>Nombre: </b>{{ $user->name }}</li>
            <li><b>Mail: </b>{{ $user->email }}</li>
            <li><b>Cuenta creada: </b>{{ $user->created_at->diffForHumans() }}</li>
        </ul>
    </div>

    <div class="column">
        <h1 class="title">Acciones</h1>
        {{ Form::open(["action" => ["UserController@destroy", $user->id], "class" => "is-inline"]) }}
        @method('delete')
        {{ Form::button("Eliminar mi cuenta",["class" => "button is-danger is-inline", "type" => "submit"]) }}
        {{ Form::close() }}
    </div>


</div>

<h1 class="title">Listado de establecimientos</h1>
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

        @forelse ($places as $place)
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
        @empty
    </tbody>
</table>
@endforelse
</tbody>
</table>


@endsection
