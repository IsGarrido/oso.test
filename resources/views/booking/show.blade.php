@extends('base')

@section('content')

<div class="container container__base message is-info">
    <div class="message-body" style="">

        <h1 class="title"> Reserva realizada </h1>
        <ul>
                <li><b> Identificador :</b> {{ $booking->id }} </li>
                <li><b> Lugar :</b>  {{ $place->title }} </li>
                <li><b> Fecha :</b>  {{ \Carbon\Carbon::parse($booking->date["date"]) }} </li>
                <li><b> Tiempo restante :</b>  {{ \Carbon\Carbon::parse($booking->date["date"])->diffForHumans() }} ( Hora actual: {{ \Carbon\Carbon::now()}} ) </li>
                <li><b> Fecha de reserva :</b>  {{ $booking->created_at }} </li>
                <li><b> Enlace : </b> <a href="{{ URL::current() }}">{{ URL::current() }}</a></li>
            </ul>

            <hr>
            <button class="button is-info" onclick="window.print();">Imprimir</button>

        </div>
</div>

@endsection
