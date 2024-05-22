@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Забіги')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Забіги: Всього - {{ $racesCount }}</h4>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <a href="{{ route('create-race.index') }}"
                               class="btn btn-primary">{{ __('Створити новий забіг') }}</a>
                            <a href="{{ route('race-types.index') }}"
                               class="btn btn-primary">{{ __('Типи забігів') }}</a>
                            <a href="{{ route('race-reload') }}"
                               class="btn btn-primary">{{ __('Перезавантажити') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Назва</th>
                                    <th>Короткий опис</th>
                                    <th>Опис</th>
                                    <th>Активний</th>
                                    <th>Дії</th>
                                    </thead>
                                    <tbody class="race-table__body">
                                    @foreach($races as $race)
                                        <tr id="{{ $race['id'] }}">
                                            <td>
                                                {{ $race['title'] }}
                                            </td>
                                            <td>
                                                {{ $race['front_description'] }}
                                            </td>
                                            <td>
                                                {{ $race['race_description'] }}
                                            </td>
                                            <td>
                                                {{ $race['is_active'] ? 'Так' : 'Ні' }}
                                            </td>
                                            <td>
                                                <div class="dropdown show d-inline-block widget-dropdown">
                                                    <a href="{{ route('create-race-form.index', [$race['id']]) }}"><span>Додати форму</span></a>
                                                    <a href="{{ route('edit-race.index', [$race['id']]) }}"
                                                       style="margin: 0 10px;"><span>Редагувати</span></a>
                                                    <a href="{{ route('delete-race', [$race['id']]) }}"><span>Видалити</span></a>
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

    <script type="module">
        $(".race-table__body").sortable({
            delay: 150,
            stop: function () {
                let selectedData = [];
                $('.race-table__body > tr').each(function () {
                    selectedData.push($(this).attr('id'));
                });
                updateOrder(selectedData);
            }
        });

        function updateOrder(data) {
            $.ajax({
                url: '{{ route('race-position-management') }}',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                type: 'POST',
                data: {position: data}
            })
        }
    </script>
@endsection
