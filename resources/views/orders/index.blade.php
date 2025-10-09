@php
    use App\Models\Race;
    use App\Models\RaceType;
@endphp

@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Учасники')])

@section('content')
    <style>
        table.table {
            table-layout: auto;
            white-space: nowrap;
        }
        table.table th {
            text-align: center;
            vertical-align: middle;
        }
        table.table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center w-100">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>ПІП</th>
                                    <th>Стать</th>
                                    <th>Дата народження</th>
                                    <th>Забіг</th>
                                    <th>Статус</th>
                                    <th>Місто</th>
                                    <th>Тип</th>
                                    <th>Дистанція</th>
                                    <th>Повна інформація</th>
                                    <th>Дії</th>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        @php($orderExtraFields = json_decode((string)$order->extra_fields, true))
                                        <tr>
                                            <td>
                                                {{ $order->id }}
                                            </td>
                                            <td>
                                                {{ $order->name }}
                                            </td>
                                            <td>
                                                {{ $order->sex !== null ? ($order->sex ? 'Чоловіча' : 'Жіноча') : '' }}
                                            </td>
                                            <td>
                                                {{ $order->dob ? date('d.m.Y', strtotime($order->dob)) : '' }}
                                            </td>
                                            <td>
                                                {{ Race::query()->where('id', '=', $order->race_id)->first()->title }}
                                            </td>
                                            <td>
                                                @if ($order->isNotPaid())
                                                    <span class="badge badge-danger">Не оплочено</span>
                                                @endif
                                                @if ($order->isPaid())
                                                    <span class="badge badge-success">Оплочено</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $order->city }}
                                            </td>
                                            <td>
                                                {{ RaceType::query()->where('id', '=', $order->type_id)->first()->type_label }}
                                            </td>
                                            <td>
                                                {{ $order->distance . 'м' }}
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#moreInfo-{{ $order->id }}">Переглянути</a>
                                                <div class="modal fade" id="moreInfo-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="moreInfoLabel-{{ $order->id }}" aria-hidden="true" style="text-align: left;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="moreInfoLabel-{{ $order->id }}">Повна інформація про учасника #{{ $order->id }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Закрити">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>ПІП:</strong> {{ $order->name }}</p>
                                                                <p><strong>Стать:</strong> {{ $order->sex !== null ? ($order->sex ? 'Чоловіча' : 'Жіноча') : '' }}</p>
                                                                <p><strong>Дата народження:</strong> {{ $order->dob ? date('d.m.Y', strtotime($order->dob)) : '' }}</p>
                                                                <p><strong>Забіг:</strong> {{ Race::query()->where('id', '=', $order->race_id)->first()->title }}</p>
                                                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                                                <p><strong>Статус:</strong> {{ $order->isPaid() ? 'Оплачено' : 'Не оплачено' }}</p>
                                                                <p><strong>Телефон:</strong> {{ $order->phone }}</p>
                                                                @if($order->club)
                                                                    <p><strong>Клуб:</strong> {{ $order->club }}</p>
                                                                @endif
                                                                <p><strong>Місто:</strong> {{ $order->city }}</p>
                                                                <p><strong>Тип:</strong> {{ RaceType::query()->where('id', '=', $order->type_id)->first()->type_label }}</p>
                                                                <p><strong>Дистанція:</strong> {{ $order->distance . 'м' }}</p>
                                                                @if($order->number)
                                                                    <p><strong>Номер:</strong> {{ $order->number }}</p>
                                                                @endif
                                                                @if($order->promocode)
                                                                    <p><strong>Промокод:</strong> {{ $order->promocode }}</p>
                                                                @endif
                                                                @if($order->notes)
                                                                    <p><strong>Додатки:</strong> {{ $order->notes }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['telegram_nick']))
                                                                    <p><strong>Telegram нік:</strong> {{ $orderExtraFields['telegram_nick'] }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['tsize']))
                                                                    <p><strong>Розмір футболки:</strong> {{ [0 => 'XS', 1 => 'S', 2 => 'M', 3 => 'L', 4 => 'XL'][$orderExtraFields['tsize']] }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['has_airsoft_gun']))
                                                                    <p><strong>Маєте страйкбольний привід:</strong> {{ $orderExtraFields['has_airsoft_gun'] == 'own' ? 'Так' : 'Ні' }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['played_before']))
                                                                    <p><strong>Грали раніше:</strong> {{ $orderExtraFields['played_before'] == 'yes' ? 'Так' : 'Ні' }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['desired_group']))
                                                                    <p><strong>Бажана група:</strong> {{ ['A' => 'Група А', 'B' => 'Група Б', 'no_preference' => 'Без різниці'][$orderExtraFields['desired_group']] }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['transport_option']))
                                                                    <p><strong>Добирання на локацію:</strong> {{ $orderExtraFields['transport_option'] == 'own' ? 'Доберуся сам/сама' : 'Потрібно забрати' }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['has_gopro']))
                                                                    <p><strong>Маєте GoPro:</strong> {{ $orderExtraFields['has_gopro'] === 'yes' ? 'Так (візьму з собою)' : 'Ні' }}</p>
                                                                @endif
                                                                @if(isset($orderExtraFields['companion_type']))
                                                                    <p><strong>З ким плануєте приїхати:</strong> {{ ['alone' => 'Сам/сама', 'spouse' => 'З дружиною / чоловіком', 'children' => 'З дітьми', 'friends' => 'З друзями', 'other' => 'Не визначився/-лась'][$orderExtraFields['companion_type']] }}</p>
                                                                @endif
                                                                <p><strong>Погоджуюсь з правилами та технікою безпеки:</strong> {{ $order->agree_rules ? 'Так' : 'Ні' }}</p>
                                                                <p><strong>Надаю згоду на обробку персональних даних:</strong> {{ $order->agree_data_processing ? 'Так' : 'Ні' }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown show d-inline-block widget-dropdown">
                                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                       id="dropdown-recent-order1" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false"
                                                       data-display="static"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdown-recent-order1">
                                                        @if($order->isNotPaid())
                                                            <li class="dropdown-item">
                                                                <a href="#"
                                                                   onclick="event.preventDefault();(confirm('Ви змінюєте статус платежа, все вірно?')) ? document.getElementById('set-order-status-form-{{$order->id}}').submit() : '';">Позначити як сплачено</a>
                                                                <form class="d-none"
                                                                      id="set-order-status-form-{{$order->id}}"
                                                                      action="{{ route('admin.orders.set-paid', ['order' => $order]) }}"
                                                                      method="post">
                                                                    <input type="hidden" name="status"
                                                                           value="{{ \App\Models\Order::STATUS_REGISTERED_PAID }}">
                                                                    @csrf
                                                                    @method('post')
                                                                </form>
                                                            </li>
                                                        @endif
                                                        @if($order->isPaid())
                                                            <li class="dropdown-item">
                                                                <a href="#"
                                                                   onclick="event.preventDefault();(confirm('Ви змінюєте статус платежа, все вірно?')) ? document.getElementById('set-order-status-unpaid-form-{{$order->id}}').submit() : '';">Позначити як не оплочено</a>
                                                                <form class="d-none"
                                                                      id="set-order-status-unpaid-form-{{$order->id}}"
                                                                      action="{{ route('admin.orders.set-unpaid', ['order' => $order]) }}"
                                                                      method="post">
                                                                    <input type="hidden" name="status"
                                                                           value="{{ \App\Models\Order::STATUS_REGISTERED_NOT_PAID }}">
                                                                    @csrf
                                                                    @method('post')
                                                                </form>
                                                            </li>
                                                        @endif
                                                        @if(!$order->isDeleted())
                                                            <li class="dropdown-item">
                                                                <a href="#"
                                                                   onclick="event.preventDefault();(confirm('Ви видаляєте учасника, все вірно?')) ? document.getElementById('delete-order-form-{{$order->id}}').submit() : '';">Видалити</a>
                                                                <form class="d-none"
                                                                      id="delete-order-form-{{$order->id}}"
                                                                      action="{{ route('admin.orders.set-deleted', ['order' => $order]) }}"
                                                                      method="post">
                                                                    <input type="hidden" name="status"
                                                                           value="{{ \App\Models\Order::STATUS_DELETED }}">
                                                                    @csrf
                                                                    @method('post')
                                                                </form>
                                                            </li>
                                                        @endif
                                                        @if(!$order->number)
                                                            <li class="dropdown-item">
                                                                <a href="#" onclick="document.getElementById('assign-number-order-form-{{$order->id}}').submit()">Надати номер</a>
                                                                <form class="d-none"
                                                                      id="assign-number-order-form-{{$order->id}}"
                                                                      action="{{ route('admin.orders.assign-number', ['order' => $order]) }}"
                                                                      method="post">
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
