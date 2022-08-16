@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Учасники')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Учасники: Всього - {{ $ordersCount }}</h4>
                            <p class="card-category">
                                <span class="d-block">
                                    <span class="badge badge-success">оплочено</span> - {{ $paidOrdersCount }}
                                </span>
                                <span class="d-block">
                                    <span class="badge badge-danger">не оплочено</span> - {{ $unpaidOrdersCount }}
                                </span>
                            </p>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <a href="{{ route('orders.create') }}" class="btn btn-primary">{{ __('Зареєструвати нового учасника') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>ПІП</th>
                                    <th>Email</th>
                                    <th>Статус</th>
                                    <th>Телефон</th>
                                    <th>Клуб</th>
                                    <th>Місто</th>
                                    <th>Тип</th>
                                    <th>Дистанція</th>
                                    <th></th>
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
                                                @if ($order->isNotPaid())
                                                <span class="badge badge-danger">не оплочено</span>
                                                @endif
                                                @if ($order->isPaid())
                                                    <span class="badge badge-success">оплочено</span>
                                                @endif
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
                                            <td>
                                                <div class="dropdown show d-inline-block widget-dropdown">
                                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                                        @if($order->isNotPaid())
                                                        <li class="dropdown-item">
                                                            <a href="#" onclick="event.preventDefault();(confirm('Ви змінюєте статус платежа, все вірно?')) ? document.getElementById('set-order-status-form-{{$order->id}}').submit() : '';">Позначити як сплачено</a>
                                                            <form class="d-none" id="set-order-status-form-{{$order->id}}" action="{{ route('admin.orders.set-paid', ['order' => $order]) }}" method="post">
                                                                <input type="hidden" name="status" value="{{ \App\Models\Order::STATUS_REGISTERED_PAID }}">
                                                                @csrf
                                                                @method('post')
                                                            </form>
                                                        </li>
                                                        @endif
                                                        @if(!$order->isDeleted())
                                                        <li class="dropdown-item">
                                                            <a href="#" onclick="event.preventDefault();(confirm('Ви видаляєте учасника, все вірно?')) ? document.getElementById('delete-order-form-{{$order->id}}').submit() : '';">Видалити</a>
                                                            <form class="d-none" id="delete-order-form-{{$order->id}}" action="{{ route('admin.orders.set-deleted', ['order' => $order]) }}" method="post">
                                                                <input type="hidden" name="status" value="{{ \App\Models\Order::STATUS_DELETED }}">
                                                                @csrf
                                                                @method('post')
                                                            </form>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
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
