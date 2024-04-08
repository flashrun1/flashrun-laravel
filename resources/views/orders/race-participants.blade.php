@extends('layouts.blank', ['title' => 'Учасники'])

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ім'я</th>
            <th scope="col">Місто</th>
            <th scope="col">Номер</th>
            <th scope="col">Клуб</th>
            <th scope="col">Дистанція</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($orders as $orderKey => $order)
            @foreach($order as $subOrderKey => $subOrder)
                <tr class="">
                    <td colspan="8" class="py-4 text-center">
                        <strong>{{ $orderKey . ': ' . $subOrderKey . 'м' }}</strong>
                    </td>
                </tr>
                @foreach($subOrder as $key => $orderData)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $orderData->name }}</td>
                        <td>{{ $orderData->city }}</td>
                        <td>{{ $orderData->number }}</td>
                        <td>{{ $orderData->club }}</td>
                        <td>{{ $orderData->distance . 'м'}}</td>
                    </tr>
                @endforeach
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection
