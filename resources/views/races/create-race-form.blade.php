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
                    <select type="select" id="race_id" name="race_id" style="width: 30%; margin: 10px;" required>
                        @foreach($races as $race)
                            <option {{ $race->id == $selectedRaceId ? 'selected' : null }} value="{{$race->id}}">{{$race->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Тип</span>
                    <select type="select" id="type_id" name="type_id" style="width: 30%;" required>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->type_label}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Зберегти</button>
            </form>
        </div>
    </div>
@endsection
