@extends('layouts.blank', ['title' => 'Participants'])

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ім'я</th>
            <th scope="col">Місто</th>
            <th scope="col">Забіг</th>
            <th scope="col">Номер</th>
            <th scope="col">Клуб</th>
            <th scope="col">Дистанція</th>
            <th scope="col">Тип Забігу</th>


        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($orders as $k => $order)
        <tr>
            <th scope="row">{{ $k+1 }}</th>
            <td>{{ $order->name }}</td>
            <td>{{ $order->city }}</td>
            <td>{{ $order->race_name }}</td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->club }}</td>
            <td>{{ $order->distance }}</td>
            <td>{{ $order->displayTypeForParticipantsList() }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
