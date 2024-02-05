@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Учасники')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Simple Table</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>ПІП</th>
                                    <th>Email</th>
                                    <th>Телефон</th>
                                    <th>Клуб</th>
                                    <th>Місто</th>
                                    <th>Тип</th>
                                    <th>Дистанція</th>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                {{ $order->id }}
                                            </td>
                                            <td>
                                                {{ $order->name }}
                                            </td>
                                            <td>
                                                {{ $order->email }}
                                            </td>
                                            <td>
                                                {{ $order->phone }}
                                            </td>
                                            <td>
                                                {{ $order->club }}
                                            </td>
                                            <td>
                                                {{ $order->city }}
                                            </td>
                                            <td>
                                                {{ $order->type }}
                                            </td>
                                            <td>
                                                {{ $order->distance }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection