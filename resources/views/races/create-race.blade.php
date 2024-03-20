@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Створення забігу')])

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mb-3">Заповніть дані</h4>
            <form id="race-creation" name="race-creation" method="POST"
                  enctype="multipart/form-data" action="{{ route('create-race.store') }}">
                @csrf
                <div class="input-group">
                    <span class="input-group-text">Назва</span>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Назва" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Картинка</span>
                    <input type="file" class="form-control" id="logo" name="logo" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Положення змагань</span>
                    <input type="file" class="form-control" id="document" name="document">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Короткий опис</span>
                    <input type="text" class="form-control" id="front_description" name="front_description"
                           placeholder="Опис під назвою">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Опис забігу</span>
                    <input type="text" class="form-control" id="race_description" name="race_description"
                           placeholder="Опис забігу">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Активний</span>
                    <input type="checkbox" id="is_active" name="is_active">
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Зберегти</button>
            </form>
        </div>
    </div>
@endsection
