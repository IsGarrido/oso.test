@extends('base')

@section('title',"Reservas para ".$place->title )

@section('content')

<div class="container container__base message is-info">
    <div class="message-body" style="">


        <h1 class="title">Listado de reservas para <a href="{{action("PlaceController@show",["id" => $place->id]) }}">{{ $place->title }}</a></h1>
        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($bookings as $booking)

                <tr>
                    <th>
                        <a href="{{action("BookingController@show",["id" => $booking->id]) }}">{{ $booking->id }}</a>
                    </th>
                    <td>{{ $booking->guest_name }} ( {{ $booking->guest_email }} )</td>
                    <td>{{ \Carbon\Carbon::parse($booking->date["date"]) }}</td>
                    <td>
                        <a class="button is-info" href="{{ action('BookingController@show',$booking->id) }}">Ver</a>
                    </td>

                </tr>
                @empty
            </tbody>
        </table>
        @endforelse
        </tbody>
        </table>

    </div>
</div>


@endsection
