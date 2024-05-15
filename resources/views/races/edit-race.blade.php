@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Редагування забігу')])

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mb-3">Заповніть дані</h4>
            <form id="race-creation" name="race-creation" method="POST"
                  enctype="multipart/form-data" action="{{ route('edit-race.store') }}">
                @csrf
                <div class="input-group">
                    <input type="hidden" id="id" name="id" value="{{ $race['id'] }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Назва</span>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Назва" required
                           value="{{ $race['title'] }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Картинка</span>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Положення змагань</span>
                    <input type="file" class="form-control" id="document" name="document">
                    <a href="{{ route('remove-competition-kegulations', ['id' => $race['id']]) }}"><span>Видалити положення змагань</span></a>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Короткий опис</span>
                    <input type="text" class="form-control" id="front_description" name="front_description"
                           placeholder="Опис під назвою" value="{{ $race['front_description'] }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Опис забігу</span>
                    <input type="text" class="form-control" id="race_description" name="race_description"
                           placeholder="Опис забігу" value="{{ $race['race_description'] }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Активний</span>
                    <input type="checkbox" id="is_active"
                           name="is_active" {{ !!$race["is_active"] ? 'checked' : null }}>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Зберегти</button>
            </form>

            <a href="{{ route('create-race-form.index', [$race['id']]) }}"><span>Додати форму</span></a>

            @if(array_key_exists('forms', $race))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                        <th>Тип</th>
                        <th>Дистанції</th>
                        <th>Номер з</th>
                        <th>Ціни</th>
                        <th>Дії</th>
                        </thead>
                        <tbody>
                        @foreach($race["forms"] as $form)
                            <tr>
                                <td>
                                    {{ $form['type_label'] }}
                                </td>
                                <td>
                                    {{ $form['distance'] }}
                                </td>
                                <td>
                                    {{ $form['number_starts_from'] }}
                                </td>
                                <td>
                                    {{ $form['payments'] }}
                                </td>
                                <td>
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a href="{{ route('edit-race-form.index', [$form['id']]) }}"
                                           style="margin-right: 10px;"><span>Редагувати</span></a>
                                        <a href="{{ route('delete-race-form', [$form['id']]) }}"><span>Видалити</span></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
