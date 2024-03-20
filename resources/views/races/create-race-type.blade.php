@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Створення типу забігу')])

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mb-3">Заповніть дані</h4>
            <form id="race-type-creation" name="race-type-creation" method="POST"
                  action="{{ route('create-race-type.store') }}">
                @csrf
                <div class="input-group">
                    <span class="input-group-text">Назва типу забігу</span>
                    <input type="text" class="form-control" id="type_label" name="type_label"
                           placeholder="Назва типу забігу">
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Зберегти</button>
            </form>
        </div>
    </div>
@endsection
