@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Забіги')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Типи забігів: Всього - {{ $raceTypesCount }}</h4>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <a href="{{ route('create-race-type.index') }}" class="btn btn-primary">{{ __('Створити новий тип забігу') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Назва</th>
                                    <th>Дії</th>
                                    </thead>
                                    <tbody>
                                    @foreach($raceTypes as $raceType)
                                        <tr>
                                            <td>
                                                {{ $raceType['type_label'] }}
                                            </td>
                                            <td>
                                                <div class="dropdown show d-inline-block widget-dropdown">
                                                    <a href="{{ route('edit-race-type.index', [$raceType['id']]) }}" style="margin-right: 10px;"><span>Редагувати</span></a>
                                                    <a href="{{ route('delete-race-type', [$raceType['id']]) }}"><span>Видалити</span></a>
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
