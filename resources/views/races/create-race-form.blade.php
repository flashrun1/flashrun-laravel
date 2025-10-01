@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Створення забігу')])

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mb-3">Заповніть дані</h4>
            <form class="needs-validation" id="race-creation" name="race-creation" method="POST"
                  enctype="multipart/form-data" action="{{ route('create-race-form.store') }}">
                @csrf
                <div class="input-group">
                    <span class="input-group-text">Дистанція</span>
                    <input type="text" class="form-control" id="distance" name="distance" placeholder="Дистанція"
                           required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Номер починається з</span>
                    <input type="text" class="form-control" id="number_starts_from" name="number_starts_from">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Ціни</span>
                    <input type="text" class="form-control" id="payments" name="payments">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Додаткова інформація</span>
                    <input class="form-control" type="text" id="notes" name="notes">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Забіг</span>
                    <select type="select" id="race_id" name="race_id" style="width: 30%; margin: 10px; min-width: fit-content;" required>
                        @foreach($races as $race)
                            <option {{ $race->id == $selectedRaceId ? 'selected' : null }} value="{{$race->id}}">{{$race->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Тип</span>
                    <select type="select" id="type_id" name="type_id" style="width: 30%; min-width: fit-content;" required>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->type_label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="margin: 10px 0;">Додаткові поля для форми учасника</span>
                    <div class="row" style="max-height: 400px; overflow-y: auto; border: 1px solid #ced4da; padding: 10px; border-radius: 5px; margin: 0;">
                        @php
                            $fields = [
                                'show_telegram_nick' => 'Telegram нік',
                                'show_tshirt_size' => 'Розмір футболки',
                                'show_airsoft_gun' => 'Є страйкбольна зброя?',
                                'show_played_before' => 'Грав раніше?',
                                'show_desired_group' => 'Бажана група',
                                'show_transport_option' => 'Транспорт',
                                'show_has_gopro' => 'Має GoPro?',
                                'show_companion_type' => 'Тип супроводу'
                            ];
                        @endphp

                        @foreach($fields as $key => $label)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <label class="form-check-label" style="display: flex; align-items: center; cursor: pointer; color: #000;">
                                        <input type="checkbox" name="extra_fields[{{ $key }}]" value="1"
                                               style="margin-right: 10px; position: relative; opacity: 1; width: 18px; height: 18px;">
                                        {{ $label }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Зберегти</button>
            </form>
        </div>
    </div>
@endsection
