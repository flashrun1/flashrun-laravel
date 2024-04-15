@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Редагування форми забігу')])

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mb-3">Заповніть дані</h4>
            <form class="needs-validation" id="race-creation" name="race-creation" method="POST"
                  enctype="multipart/form-data" action="{{ route('edit-race-form.store') }}">
                @csrf
                <div class="input-group">
                    <input type="hidden" id="id" name="id" value="{{ $raceForm['id'] }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Дистанція</span>
                    <input type="text" class="form-control" id="distance" name="distance" placeholder="Дистанція"
                           required value="{{ $raceForm['distance'] }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Номер починається з</span>
                    <input type="text" class="form-control" id="number_starts_from" name="number_starts_from"
                           value="{{ $raceForm['number_starts_from'] }}">
                </div>
                <div class="input-group">
                    @include('popper::assets')
                    <span class="input-group-text">Ціни</span>
                    <input type="text" class="form-control" id="payments" name="payments"
                           value="{{ $raceForm['payments'] }}">
                    <span class="price-tooltip" @popper(
                          Правила використання:
                          1. Якщо використовувати дати, то формат запису повинен бути наступним  -  дд.мм.рррр: ціна
                          2. Доступні формати:
                          - Якщо треба додати поточний проміжок дати до певного числа
                          або використати попередню дату для зміни ціни, запис має бути наступним: -дд.мм.рррр: ціна
                          - Якщо потрібно використати дві дати, то запис повинен бути таким: дд.мм.рррр-дд.мм.рррр: ціна
                          - Якщо потрібно використати ціну для однієї дати, запис повинен бути таким: дд.мм.рррр: ціна

                          Приклад: -19.05.2024: 100;-30.07.2024: 300;01.08.2024: 400
                          До 19.05.2024 ціна буде 100, з 20.05.2024 по 30.07.2024 буде 300 та 01.08.2024 буде 400
                          )>?</span>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Додаткова інформація</span>
                    <input class="form-control" type="text" id="notes" name="notes"
                           value="{{ array_key_exists('notes', $raceForm) ? $raceForm['notes'] : '' }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Забіг</span>
                    <select type="select" id="race_id" name="race_id" style="width: 30%; margin: 10px;" required>
                        @foreach($races as $race)
                            <option {{ $raceForm['race_id'] === $race['id'] ? 'selected' : null }} value="{{$race->id}}">{{$race->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Тип</span>
                    <select type="select" id="type_id" name="type_id" style="width: 30%;" required>
                        @foreach($types as $type)
                            <option {{ $raceForm['type_id'] === $type['id'] ? 'selected' : null }}  value="{{$type->id}}">{{$type->type_label}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Зберегти</button>
            </form>
        </div>
    </div>
@endsection
