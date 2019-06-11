@extends('user.user')

@section('title', "List")



@section("content2")
<table class="table is-bordered is-striped is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Mail</th>
            <th>ID</th>
            <th>Fecha de creación</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($users as $user)
        <tr>
            <th><a href="{{ action('UserController@show',["id" => $user->id ]) }}">{{ $user->name }}</a></th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->created_at->toDateString() }}</td>
            <td>{{ $user->is_blocked === false ? "Activo" : "Bloqueado" }}</td>
            <td>
                <!-- Edit -->
                {{ Form::open(["action" => ["UserController@show", $user->id], "class" => "is-inline"]) }}
                @method('get')
                {{ Form::button("Editar",["class" => "button is-info   is-inline", "type" => "submit"]) }}
                {{ Form::close() }}

                <!-- Block -->
                {{ Form::open(["action" => ["UserController@toggleblock", $user->id], "class" => "is-inline"]) }}
                @method('patch')
                {{ Form::button($user->is_blocked === true ? "Desbloquear" : "Bloquear",["class" => "button is-warning  is-inline", "type" => "submit"]) }}
                {{ Form::close() }}

                <!-- Delete -->
                {{ Form::open(["action" => ["UserController@destroy", $user->id], "class" => "is-inline"]) }}
                @method('delete')
                {{ Form::button("Eliminar",["class" => "button is-danger is-inline", "type" => "submit"]) }}
                {{ Form::close() }}


            </td>
        </tr>
        @empty
        Sin contenido
        @endforelse
    </tbody>
</table>


@endsection
